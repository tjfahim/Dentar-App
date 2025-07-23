<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Following;
use App\Services\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Mail\OtpEmail;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Student;
use App\Rules\EmailExistsInAnyTable;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class AuthApi extends Controller
{
    private $services;

    public function __construct(Services $services)
    {
        $this->services = $services;
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string',
            'phone' => 'nullable',
            'role' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $errorString = implode(', ', $errors);

            return response()->json(['error' => $errorString], 422);
        }

        // Prepare input data
        $data = $request->except('password');
        $data['password'] = Hash::make($request->input('password'));
        $data['role'] = $request->input('role') ?? 'user';
        $data['created_at'] = now();
        $data['updated_at'] = now();

        if ($request->hasFile('profile_picture')) {
            $profileImage = $this->services->imageUpload($request->file('profile_picture'), 'profile_picture/');
            $data['profile_picture'] = 'profile_picture/' . $profileImage;
        }

        $user = User::create($data);

        return response()->json([
            'message' => 'User created successfully.',
            'email' => $user->email

        ], 201);
    }
    public function update(Request $request)
    {
        try {
            $user = Auth::user();

            $validator = Validator::make($request->all(), [
                'name' => 'nullable|string|max:255',
                'phone' => 'nullable',
                'role' => 'nullable|string',
                'status' => 'nullable',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'error' => $validator->errors()->toArray()
                ], 422);
            }

            $data = $request->only([
                'name', 'email', 'phone', 'profile_picture',
                'role', 'status', 'is_active'
            ]);

            // Check if the phone number is unique
            if ($request->has('phone') && $user->phone != $data['phone']) {
                $normalizedPhone = ltrim($data['phone'], '+');
                $crossCheckPhone = User::where('phone', $normalizedPhone)
                    ->orWhere('phone', '+' . $normalizedPhone)
                    ->count();

                if ($crossCheckPhone > 0) {
                    return response()->json([
                        'message' => 'Phone already exists.'
                    ], 409);
                }
            }

            // Handle profile picture upload
            if ($request->hasFile('profile_picture')) {
                try {
                    if ($user->image) {
                        $this->services->imageDestroy($user->image, 'profile_picture/');
                    }

                    $profileImage = $this->services->imageUpload($request->file('profile_picture'), 'profile_picture/');
                    $data['profile_picture'] = 'profile_picture/' . $profileImage;
                } catch (\Exception $e) {
                    return response()->json(['error' => 'Image upload failed: ' . $e->getMessage()], 500);
                }
            }

            // Set default values if fields are not provided
            $data['name'] = $data['name'] ?? $user->name;
            $data['email'] = $data['email'] ?? $user->email;
            $data['phone'] = $data['phone'] ?? $user->phone;
            $data['profile_picture'] = $data['profile_picture'] ?? $user->profile_picture;
            $data['role'] = $data['role'] ?? $user->role;
            $data['status'] = $data['status'] ?? $user->status;
            $data['is_active'] = $data['is_active'] ?? $user->is_active;

            // Update the user
            $user->update($data);

            return response()->json([
                'message' => 'User updated successfully.',
                'user' => $user,
            ]);
        } catch (\Exception $e) {
            // Log the error for debugging purposes
            Log::error('Error updating user:', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'An error occurred. Please try again later.'], 500);
        }
    }


 public function updateNotification(Request $request)
    {
        try {
            $user = Auth::user();
            
            $validator = Validator::make($request->all(), [
       
                'notification_play' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'error' => $validator->errors()->toArray()
                ], 422);
            }

            $data = $request->only([
                'notification_play'
            ]);
            

            // Set default values if fields are not provided
            $data['notification_play'] = $data['notification_play'] ?? $user->notification_play;
      

            // Update the user
            $user->update($data);

            return response()->json([
                'message' => 'User notification play successfully.',
                'user' => $user,
            ]);
        } catch (\Exception $e) {
            // Log the error for debugging purposes
            Log::error('Error updating user:', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'An error occurred. Please try again later.'], 500);
        }
    }
    public function passwordUpdate(Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6',
        ]);


        if (!Hash::check($request->current_password, $user->password)) {
            return response()->json(['error' => 'Current password is incorrect'], 400);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return response()->json(['message' => 'Password updated successfully'], 200);
    }

    public function logout(Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Logged out successfully.'
        ]);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            if ($token = JWTAuth::attempt($credentials)) {
                return response()->json(['token' => $token]);
            } else {
                return response()->json(['error' => 'Invalid credentials'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'Could not create token'], 500);
        }
    }

    public function profileDelete()
    {
        try {
            $user = Auth::user();
            $user->delete();

            return response()->json([
                'success' => true,
                'message' => 'Profile deleted successfully.',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Profile deletion failed. Please try again later.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function userInfo()
    {
        $user = Auth::user();

        if ($user) {
            if(!empty($user->profile_picture)){
                $user->profile_picture = asset('storage/' . $user->profile_picture);
            }
            else{
                $user->profile_picture = null;
            }
            return response()->json([
                'user' => $user,
            ]);
        } else {
            return response()->json(['error' => 'User not found'], 404);
        }
    }


    public function verifyOtp(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'otp' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $errorString = implode(', ', $errors);

            return response()->json(['error' => $errorString], 422);
        }

        $otpRecord = DB::table('password_resets')
            ->where('email', $request->email)
            ->where('token', $request->otp)
            ->first();

        if (!$otpRecord) {
            return response()->json(['message' => 'Invalid OTP'], 400);
        }

        $user = User::where('email', $request->email)->first();
        $user->update(['status' => 1]);
        DB::table('password_resets')->where('email', $user->email)->delete();
        $token = JWTAuth::fromUser($user);

        return response()->json([
            'message' => 'Email verified successfully',
            'token' => $token
        ], 201);

    }

    public function sendOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email', new EmailExistsInAnyTable()],
        ]);




        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $errorString = implode(', ', $errors);

            return response()->json(['error' => $errorString], 422);
        }



        $user = Patient::where('email', $request->email)->first();


        if(!$user){
            $user = Student::where('email', $request->email)->first();

        }
        if(!$user){
            $user = Doctor::where('email', $request->email)->first();

        }

        if (!$user) {
            return response()->json(['message' => 'Email not found'], 404);
        }

        $otp = rand(10000, 99999);
        DB::table('password_resets')->updateOrInsert(
            ['email' => $user->email],
            [
                'token' => $otp,
                'created_at' => now()
            ]
        );

        Mail::to($user->email)->send(new OtpEmail($user, $otp));

        return response()->json(['message' => 'OTP sent to your email'], 201);
    }

    public function checkOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email', new EmailExistsInAnyTable()],
            'otp' => 'required'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $errorString = implode(', ', $errors);

            return response()->json(['error' => $errorString], 422);
        }

        $otpRecord = DB::table('password_resets')
            ->where('email', $request->email)
            ->where('token', $request->otp)
            ->first();

        if (!$otpRecord) {
            return response()->json(['message' => 'Invalid OTP'], 400);
        }

        return response()->json(['message' => 'OTP verified'], 201);
    }

    public function resetPassword(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email', new EmailExistsInAnyTable()],
            'otp' => 'required',
            'password' => 'required|min:6'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            // Join errors into a single string
            $errorString = implode(', ', $errors);

            return response()->json(['error' => $errorString], 422);
        }


        $user = Patient::where('email', $request->email)->first();


        if(!$user){
            $user = Student::where('email', $request->email)->first();

        }
        if(!$user){
            $user = Doctor::where('email', $request->email)->first();

        }


        $otpRecord = DB::table('password_resets')
            ->where('email', $user->email)
            ->where('token', $request->otp)
            ->first();

        if (!$otpRecord) {
            return response()->json(['message' => 'Invalid OTP'], 400);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        DB::table('password_resets')->where('email', $user->email)->delete();

        return response()->json(['message' => 'Password reset successfully']);
    }

    public function deleteAccount(Request $request){
        $deletedRows = DB::table('users')->where('email', $request->email)->delete();

        // Check if any rows were deleted
        if ($deletedRows > 0) {
            return response()->json(['message' => 'Account deleted successfully']);
        } else {
            return response()->json(['message' => 'Account not found'], 404);
        }
    }


}

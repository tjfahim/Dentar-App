<?php

namespace App\Http\Controllers\API\V1\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use App\Http\Resources\UserResource;
use App\Http\Resources\StudentResource;
use App\Http\Resources\DoctorResource;

use App\Models\Patient;
use App\Models\Student;
use App\Models\Doctor;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'userType' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        //  user type patient
        if($request->userType == 'patient'){
             // Validate the incoming request data
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'email|unique:patients,email|unique:students,email|unique:doctors,email',
                'phone' => 'required|string|max:15|unique:patients,phone|unique:students,phone|unique:doctors,phone',
                'password' => 'required|string', // confirm password
                'image' => 'nullable|image',
                'address' => 'nullable|string',
                'dob' => 'nullable|date',
                'gender' => 'nullable|string',
                'medical_history' => 'nullable|string',
            ]);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 422);
            }

            // Handle the image upload
            $imagePath = null;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('images/patients', 'public');
            }

            // Create the patient record
            $patient = Patient::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
                'image' => $imagePath, // Save the image path
                'address' => $request->address,
                'dob' => $request->dob,
                'gender' => $request->gender,
                'medical_history' => $request->medical_history,

            ]);

            // Create a token for the patient after successful registration
            $token = $patient->createToken('auth_token')->plainTextToken;

            // Return the patient details and token
            return response()->json([
                'message' => 'Registration successful',
                'token' => $token,
                'user' => new UserResource($patient),
            ]);
        }elseif($request->userType == 'student') {

            // studetn user
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'email|unique:patients,email|unique:students,email|unique:doctors,email',
                'phone' => 'required|string|max:15|unique:patients,phone|unique:students,phone|unique:doctors,phone',
                'password' => 'required|string|min:4', 
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
                'address' => 'nullable|string',
                'dob' => 'nullable|date',
                'gender' => 'nullable|string',
                'university' => 'nullable|string',
                'year' => 'nullable|string',
                'specialization' => 'nullable|string',
                'medical_history' => 'nullable|string',
                'additional_info' => 'nullable|string',
                'bio' => 'nullable|string',
            ]);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 422);
            }

            // Handle the image upload if any
            $imagePath = null;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('images/students', 'public');
            }

            // Create the student record
            $student = Student::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
                'image' => $imagePath, // Save the image path if uploaded
                'address' => $request->address,
                'dob' => $request->dob,
                'gender' => $request->gender,
                'university' => $request->university,
                'year' => $request->year,
                'specialization' => $request->specialization,
                'medical_history' => $request->medical_history,
                'additional_info' => $request->additional_info,
                'bio' => $request->bio,
            ]);

            // Generate a token for the student after successful registration
            $token = $student->createToken('auth_token')->plainTextToken;

            // Return the student details and token
            return response()->json([
                'message' => 'Registration successful',
                'token' => $token,
                'user' => new UserResource($student),  // Adjust to StudentResource if needed
            ]);


        }elseif($request->userType == 'doctor'){

             // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'email|unique:patients,email|unique:students,email|unique:doctors,email',
            'phone' => 'required|string|max:15|unique:patients,phone|unique:students,phone|unique:doctors,phone',
            'password' => 'required|string|min:4', // Confirm password
            'specialization' => 'required|string',
            'hospital' => 'nullable|string',
            'gender' => 'nullable|string',
            'biography' => 'nullable|string',
            'dob' => 'nullable|date',
            'degree' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'signature' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'address' => 'nullable|string',
            'role' => 'nullable|in:normal,admin',
            'bmdc_number' => 'string|nullable',
            'bmdc_type' => 'string|nullable',
            'occupation' => 'string|nullable',
            'organization' => 'string|nullable',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        // Handle the image upload for profile and signature images
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/doctors', 'public');
        }

        $signaturePath = null;
        if ($request->hasFile('signature')) {
            $signaturePath = $request->file('signature')->store('images/signatures', 'public');
        }

        // Create the doctor record
        $doctor = Doctor::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'specialization' => $request->specialization,
            'hospital' => $request->hospital,
            'gender' => $request->gender,
            'biography' => $request->biography,
            'dob' => $request->dob,
            'degree' => $request->degree,
            'image' => $imagePath,
            'signature' => $signaturePath,
            'address' => $request->address,
            'bmdc_number' => $request->bmdc_number,
            'bmdc_type' => $request->bmdc_type,
            'occupation' => $request->occupation,
            'organization' => $request->organization,
            'role' => $request->role ?? 'normal', // Default to normal role
            'status' => 0,

        ]);

        // Generate a token for the doctor after successful registration
        $token = $doctor->createToken('auth_token')->plainTextToken;

        // Return the doctor details and token
        return response()->json([
            'message' => 'Registration successful',
            'token' => $token,
            'user' => new UserResource($doctor),  // Adjust to DoctorResource if needed
        ]);


        }

    }

    

    public function verifyOtp(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:doctors,email',
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

        $user = Doctor::where('email', $request->email)->first();
        $user->update(['status' => 1]);
        DB::table('password_resets')->where('email', $user->email)->delete();

        return response()->json([
            'message' => 'Email verified successfully',
        ], 201);

    }

    public function sendOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:doctors,email'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $errorString = implode(', ', $errors);
        
            return response()->json(['error' => $errorString], 422);
        }

        $user = Doctor::where('email', $request->email)->first();

        if (!$user) {
            return response()->json(['message' => 'Email not found'], 404);
        }

        $otp = rand(100000, 999999);
        $otp = 123456;

        DB::table('password_resets')->updateOrInsert(
            ['email' => $user->email],
            [
                'token' => $otp,
                'created_at' => now()
            ]
        );

        // Mail::to($user->email)->send(new OtpEmail($user, $otp));

        return response()->json(['message' => 'OTP sent to your email'], 201);
    }

    public function checkOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
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

}

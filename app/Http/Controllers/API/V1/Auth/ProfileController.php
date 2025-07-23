<?php

namespace App\Http\Controllers\API\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Student;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function profile()
    {
        $user = Auth::user();

        return new  UserResource($user);
    }

    public function profileDelete($id){

          try {
             $user = Patient::findOrFail($id);

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
        
        

        if(!$user){
            return 'User not found';
        }

        $user->delete();

        return 'User deleted successfully';
    }
    
    public function accountdelete(){

        return view('accountdelete');

    }
public function accountDeleteSubmit(Request $request)
{
   

    try {
        // Check if email exists in the Patient table
        $user = Patient::where('email', $request->email)->first();

        // If not found in Patient, check the Doctor table
        if (!$user) {
            $user = Doctor::where('email', $request->email)->first();
        }

        // If not found in Doctor, check the Student table
        if (!$user) {
            $user = Student::where('email', $request->email)->first();
        }

        // If still no user is found
        if (!$user) {
            return 'No account found with the provided email.';
        }

        // If a user is found, proceed to delete based on their userType
        $userType = $user->userType;
        $userToDelete = null;

        if ($userType == 'patient') {
            // Ensure the user exists in the Patient table
            $userToDelete = Patient::findOrFail($user->id);
        } elseif ($userType == 'student') {
            // Ensure the user exists in the Student table
            $userToDelete = Student::findOrFail($user->id);
        } elseif ($userType == 'doctor') {
            // Ensure the user exists in the Doctor table
            $userToDelete = Doctor::findOrFail($user->id);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Invalid user type.',
            ], 400);
        }

        // Delete the user profile
        $userToDelete->delete();
return 'Your account has been deleted successfully.';
        // Return success response
        return response()->json([
            'success' => true,
            'message' => 'Your account has been deleted successfully.',
        ], 200);

    } catch (\Exception $e) {
        // Handle errors and log the exception message for debugging
        \Log::error("An error occurred during account deletion: " . $e->getMessage());


return 'Account deletion failed. Please try again later.';
        return response()->json([
            'success' => false,
            'message' => 'Account deletion failed. Please try again later.',
            'error' => $e->getMessage(),
        ], 500);
    }
}



public function profileDeleteforall(Request $request)
{
    // Get the authenticated user
    $user = $request->user();
    if (!$user) {
        // If no user is authenticated, return a 401 Unauthorized response
        return response()->json([
            'success' => false,
            'message' => 'Unauthorized. Please log in.',
        ], 401);
    }

    // Ensure user has a valid userType and user ID
    if (is_null($user->userType) || is_null($user->id)) {
        return response()->json([
            'success' => false,
            'message' => 'Invalid user data.',
        ], 400);
    }

    try {
        // Check user type and delete accordingly
        $userType = $user->userType;

        if ($userType == 'patient') {
            // Ensure the user exists in the Patient table
            $userToDelete = Patient::findOrFail($user->id);
        } elseif ($userType == 'student') {
            // Ensure the user exists in the Student table
            $userToDelete = Student::findOrFail($user->id);
        } elseif ($userType == 'doctor') {
            // Ensure the user exists in the Doctor table
            $userToDelete = Doctor::findOrFail($user->id);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Invalid user type.',
            ], 400);
        }

        // Delete the user profile
        $userToDelete->delete();

        // Return success response
        return response()->json([
            'success' => true,
            'message' => 'Profile deleted successfully.',
        ], 200);
    } catch (\Exception $e) {
        // Handle errors and log the exception message for debugging
        \Log::error("An error occurred during profile deletion: " . $e->getMessage());

        return response()->json([
            'success' => false,
            'message' => 'Profile deletion failed. Please try again later.',
            'error' => $e->getMessage(),
        ], 500);
    }
}


    public function updateProfile(Request $request)
    {

        $user = $request->user();

        $userType = $user->userType;

        if ($userType == 'patient') {
            $validator = Validator::make($request->all(), [
                'name' => 'sometimes|required|string|max:255',
                'email' => 'sometimes|email|unique:patients,email,' . $user->id,
                'phone' => 'sometimes|required|string|max:15|unique:patients,phone,' . $user->id,
                'image' => 'nullable|image',
                'address' => 'nullable|string',
                'dob' => 'nullable|date',
                'gender' => 'nullable|string',
                'medical_history' => 'nullable|string',
                'token' => 'nullable|string',
            ]);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 422);
            }

            // Handle file upload
            $imagePath = $user->image;

            if ($request->hasFile('image')) {

                $file = time() . '.' . $request->image->extension();

                $request->image->move(public_path('images/patients/'), $file);

                $imagePath = 'images/patients/' . $file;
            }
            // Retain existing image if not replaced
            // if ($request->hasFile('image')) {
            //     $imagePath = $request->file('image')->store('images/patients', 'public');
            // }

            $date = date_create($request->dob);

            // Update patient data
            $user->update([
                'name' => $request->name ?? $user->name,
                'image' => $imagePath,
                'address' => $request->address ?? $user->address,
                'dob' => date_format($date, "Y-m-d") ??  $user->dob,
                'gender' => $request->gender ?? $user->gender,
                'medical_history' => $request->medical_history ?? $user->medical_history,
                'email' => $request->email ?? $user->email,
            ]);

        } elseif ($userType == 'student') {
            $validator = Validator::make($request->all(), [
                'name' => 'sometimes|required|string|max:255',
                'email' => 'sometimes|email|unique:students,email,' . $user->id,
                'phone' => 'sometimes|required|string|max:15|unique:students,phone,' . $user->id,
                'image' => 'nullable|image',
                'address' => 'nullable|string',
                'dob' => 'nullable|date',
                'gender' => 'nullable|string',
                'university' => 'nullable|string',
                'year' => 'nullable|string',
                'specialization' => 'nullable|string',
                'medical_history' => 'nullable|string',
                'additional_info' => 'nullable|string',
                'bio' => 'nullable|string',
                'organization' => 'nullable|string',
            ]);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 422);
            }

            // Handle file upload
            $imagePath = $user->image;

            if ($request->hasFile('image')) {

                $file = time() . '.' . $request->image->extension();

                $request->image->move(public_path('images/students/'), $file);

                $imagePath = 'images/students/' . $file;
            }
            // if ($request->hasFile('image')) {
            //     $imagePath = $request->file('image')->store('images/students', 'public');
            // }

            $date = date_create($request->dob);

            // Update student data
            $user->update([
                'name' => $request->name ?? $user->name,
                'image' => $imagePath,
                'address' => $request->address ?? $user->address,
                'dob' => date_format($date, "Y-m-d") ??  $user->dob,
                'gender' => $request->gender ?? $user->gender,
                'university' => $request->university ?? $user->university,
                'year' => $request->year ?? $user->year,
                'specialization' => $request->specialization ?? $user->specialization,
                'medical_history' => $request->medical_history ?? $user->medical_history,
                'additional_info' => $request->additional_info ?? $user->additional_info,
                'organization' => $request->organization ?? $user->organization,

            ]);

        } elseif ($userType == 'doctor') {
            $validator = Validator::make($request->all(), [
                'name' => 'sometimes|required|string|max:255',
                'email' => 'sometimes|email|unique:doctors,email,' . $user->id,
                'phone' => 'sometimes|required|string|max:15|unique:doctors,phone,' . $user->id,
                'specialization' => 'sometimes|required|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
                'signature' => 'nullable|image|mimes:jpeg,png,jpg,gif',
                'hospital' => 'nullable|string',
                'gender' => 'nullable|string',
                'biography' => 'nullable|string',
                'dob' => 'nullable|date',
                'degree' => 'nullable|string',
                'address' => 'nullable|string',
                'bmdc_number' => 'nullable|string',
                'bmdc_type' => 'nullable|string',
                'occupation' => 'nullable|string',
                'organization' => 'nullable|string',
            ]);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 422);
            }

            // Handle file uploads
            $imagePath = $user->image;
            $signaturePath = $user->signature;

            if ($request->image) {

                $file = time() . '.' . $request->image->extension();

                $request->image->move(public_path('images/doctors/'), $file);

                $imagePath = 'images/doctors/' . $file;
            }

            if ($request->signature) {

                $file = time() . '.' . $request->signature->extension();

                $request->signature->move(public_path('images/signature/'), $file);

                $signaturePath = 'images/signature/' . $file;
            }

            $date = date_create($request->dob);
            // Update doctor data
            $user->update([
                'name' => $request->name ?? $user->name,
                'specialization' => $request->specialization ?? $user->specialization,
                'image' => $imagePath,
                'signature' => $signaturePath,
                'hospital' => $request->hospital ?? $user->hospital,
                'gender' => $request->gender ?? $user->gender,
                'biography' => $request->biography ?? $user->biography,
                'dob' => date_format($date, "Y-m-d") ??  $user->dob,
                'degree' => $request->degree ?? $user->degree,
                'address' => $request->address ?? $user->address,
                'bmdc_number' => $request->bmdc_number ?? $user->bmdc_number,
                'bmdc_type' => $request->bmdc_type ?? $user->bmdc_type,
                'occupation' => $request->occupation ?? $user->occupation,
                'organization' => $request->organization ?? $user->organization,
            ]);
        }

        // Return updated user data
        return response()->json([
            'message' => 'Profile updated successfully',
            'user' => new UserResource($user)
        ]);
    }


    public function forgetPassword()
    {

    }
    
       public function updateProfilenotification(Request $request)
    {

        $user = $request->user();

        $userType = $user->userType;

        if ($userType == 'patient') {
      
            $user->update([
                'notification_play' => $request->notification_play ?? $user->notification_play
            ]);

        } elseif ($userType == 'student') {
          
            $user->update([
                'notification_play' => $request->notification_play ?? $user->notification_play,
              
            ]);

        } elseif ($userType == 'doctor') {
          
            $user->update([
                'notification_play' => $request->notification_play ?? $user->notification_play,
            
            ]);
        }

        // Return updated user data
        return response()->json([
            'message' => 'Profile updated successfully',
            'user' => new UserResource($user)
        ]);
    }


    public function deviceToken(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'device_token' => ['required', 'string']
        ]);


        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $user = Auth::user();

        $user->update([
            'token' => $request->device_token,
        ]);


        return response()->json(['message' => 'Device token updated successfully'], 200);
    }
}

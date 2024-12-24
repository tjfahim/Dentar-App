<?php

namespace App\Http\Controllers\API\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\Patient;
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

        $user = Patient::find($id);

        if(!$user){
            return response()->json(['error' => 'User not found'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'User deleted successfully'], 200);
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

            if ($request->hasFile('signature')) {

                $file = time() . '.' . $request->image->extension();

                $request->image->move(public_path('images/signature/'), $file);

                $imagePath = 'images/signature/' . $file;
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
}

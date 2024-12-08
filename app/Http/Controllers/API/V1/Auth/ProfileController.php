<?php

namespace App\Http\Controllers\API\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
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

    public function updateProfile(Request $request)
    {



        // $validator = Validator::make($request->all(), [
        //     'userType' => 'required|in:patient,student,doctor',
        // ]);

        // if ($validator->fails()) {
        //     return response()->json(['error' => $validator->errors()], 422);
        // }

        // // Get the authenticated user
        $user = $request->user();

        $userType = $user->userType;



        if ($userType == 'patient') {
            $validator = Validator::make($request->all(), [
                'name' => 'sometimes|required|string|max:255',
                'email' => 'sometimes|email|unique:patients,email,' . $user->id,
                'phone' => 'sometimes|required|string|max:15|unique:patients,phone,' . $user->id,
                'password' => 'nullable|string',
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
            $imagePath = $user->image; // Retain existing image if not replaced
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('images/patients', 'public');
            }

            // Update patient data
            $user->update([
                'name' => $request->name ?? $user->name,
                'email' => $request->email ?? $user->email,
                'phone' => $request->phone ?? $user->phone,
                'password' => $request->password ? Hash::make($request->password) : $user->password,
                'image' => $imagePath,
                'address' => $request->address ?? $user->address,
                'dob' => $request->dob ?? $user->dob,
                'gender' => $request->gender ?? $user->gender,
                'medical_history' => $request->medical_history ?? $user->medical_history,
            ]);

        } elseif ($userType == 'student') {
            $validator = Validator::make($request->all(), [
                'name' => 'sometimes|required|string|max:255',
                'email' => 'sometimes|email|unique:students,email,' . $user->id,
                'phone' => 'sometimes|required|string|max:15|unique:students,phone,' . $user->id,
                'password' => 'nullable|string',
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
                $imagePath = $request->file('image')->store('images/students', 'public');
            }

            // Update student data
            $user->update([
                'name' => $request->name ?? $user->name,
                'email' => $request->email ?? $user->email,
                'phone' => $request->phone ?? $user->phone,
                'password' => $request->password ? Hash::make($request->password) : $user->password,
                'image' => $imagePath,
                'address' => $request->address ?? $user->address,
                'dob' => $request->dob ?? $user->dob,
                'gender' => $request->gender ?? $user->gender,
                'university' => $request->university ?? $user->university,
                'year' => $request->year ?? $user->year,
                'specialization' => $request->specialization ?? $user->specialization,
                'medical_history' => $request->medical_history ?? $user->medical_history,
                'additional_info' => $request->additional_info ?? $user->additional_info,
                'bio' => $request->bio ?? $user->bio,
            ]);

        } elseif ($userType == 'doctor') {
            $validator = Validator::make($request->all(), [
                'name' => 'sometimes|required|string|max:255',
                'email' => 'sometimes|email|unique:doctors,email,' . $user->id,
                'phone' => 'sometimes|required|string|max:15|unique:doctors,phone,' . $user->id,
                'password' => 'nullable|string',
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
                'role' => 'nullable|in:normal,admin',
            ]);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 422);
            }

            // Handle file uploads
            $imagePath = $user->image;
            $signaturePath = $user->signature;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('images/doctors', 'public');
            }
            if ($request->hasFile('signature')) {
                $signaturePath = $request->file('signature')->store('images/signatures', 'public');
            }

            // Update doctor data
            $user->update([
                'name' => $request->name ?? $user->name,
                'email' => $request->email ?? $user->email,
                'phone' => $request->phone ?? $user->phone,
                'password' => $request->password ? Hash::make($request->password) : $user->password,
                'specialization' => $request->specialization ?? $user->specialization,
                'image' => $imagePath,
                'signature' => $signaturePath,
                'hospital' => $request->hospital ?? $user->hospital,
                'gender' => $request->gender ?? $user->gender,
                'biography' => $request->biography ?? $user->biography,
                'dob' => $request->dob ?? $user->dob,
                'degree' => $request->degree ?? $user->degree,
                'address' => $request->address ?? $user->address,
                'bmdc_number' => $request->bmdc_number ?? $user->bmdc_number,
                'bmdc_type' => $request->bmdc_type ?? $user->bmdc_type,
                'occupation' => $request->occupation ?? $user->occupation,
                'organization' => $request->organization ?? $user->organization,
                'role' => $request->role ?? $user->role,
            ]);
        }

        // Return updated user data
        return response()->json([
            'message' => 'Profile updated successfully',
            'user' => $user
        ]);
    }

}

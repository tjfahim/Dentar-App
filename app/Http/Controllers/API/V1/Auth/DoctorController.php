<?php

namespace App\Http\Controllers\API\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\DoctorResource; // Make sure the DoctorResource exists
use App\Models\Doctor;  // Make sure the Doctor model exists
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{
    // Login method
    public function login(Request $request)
    {
        // Validate the input
        $validator = Validator::make($request->all(), [
            'phone' => 'required_without:email|string|max:15', // If phone is provided, email is not required
            'email' => 'required_without:phone|email', // If email is provided, phone is not required
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        // Find the doctor by either phone or email
        if ($request->has('phone')) {
            $doctor = Doctor::where('phone', $request->phone)->first();
        } elseif ($request->has('email')) {
            $doctor = Doctor::where('email', $request->email)->first();
        }

        // Check if doctor exists and verify the password
        if (!$doctor || !Hash::check($request->password, $doctor->password)) {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }

        // Generate a token for the doctor
        $token = $doctor->createToken('auth_token')->plainTextToken;

        // Return the token and doctor information in the response
        return response()->json([
            'message' => 'Login successful',
            'token' => $token,
            'user' => new DoctorResource($doctor),  // Adjust to DoctorResource if needed
        ]);
    }

    // Register method
    public function register(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:doctors,email',
            'phone' => 'required|string|max:15|unique:doctors,phone',
            'password' => 'required|string|min:4|confirmed', // Confirm password
            'specialization' => 'required|string',
            'hospital' => 'nullable|string',
            'gender' => 'nullable|string',
            'biography' => 'nullable|string',
            'dob' => 'nullable|date',
            'degree' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'signature' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'address' => 'nullable|string',
            'role' => 'nullable|in:normal,admin', // Default to normal, or specify role
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
            'role' => $request->role ?? 'normal', // Default to normal role
        ]);

        // Generate a token for the doctor after successful registration
        $token = $doctor->createToken('auth_token')->plainTextToken;

        // Return the doctor details and token
        return response()->json([
            'message' => 'Registration successful',
            'token' => $token,
            'user' => new DoctorResource($doctor),  // Adjust to DoctorResource if needed
        ]);
    }

    // Soft delete method
    public function destroy($id)
    {
        // Find the doctor by ID
        $doctor = Doctor::find($id);

        if (!$doctor) {
            return response()->json(['error' => 'User not found'], 404);
        }

        // Soft delete the doctor
        $doctor->delete();

        return response()->json(['message' => 'User deleted successfully']);
    }
}

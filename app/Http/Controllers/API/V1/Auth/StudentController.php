<?php

namespace App\Http\Controllers\API\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\StudentResource;
use App\Models\Student;  // Make sure the Student model exists
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    // Login method
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required_without:email|string|max:15', // If phone is provided, email is not required
            'email' => 'required_without:phone|email', // If email is provided, phone is not required
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        // Find the student by either phone or email
        if ($request->has('phone')) {
            $student = Student::where('phone', $request->phone)->first();
        } elseif ($request->has('email')) {
            $student = Student::where('email', $request->email)->first();
        }

        // Check if student exists and verify the password
        if (!$student || !Hash::check($request->password, $student->password)) {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }

        // Generate a token for the student
        $token = $student->createToken('auth_token')->plainTextToken;

        // Return the token and student information in the response
        return response()->json([
            'message' => 'Login successful',
            'token' => $token,
            'user' => new StudentResource($student),  // Adjust to StudentResource if needed
        ]);
    }

    // Register method
    public function register(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'phone' => 'required|string|max:15|unique:students,phone',
            'password' => 'required|string|min:4|confirmed', // Confirm password
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
            'user' => new StudentResource($student),  // Adjust to StudentResource if needed
        ]);
    }

    // Soft delete method
    public function destroy($id)
    {
        // Find the student by ID
        $student = Student::find($id);

        if (!$student) {
            return response()->json(['error' => 'User not found'], 404);
        }

        // Soft delete the student
        $student->delete();

        return response()->json(['message' => 'User deleted successfully']);
    }
}

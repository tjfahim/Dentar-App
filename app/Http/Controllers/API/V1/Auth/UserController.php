<?php

namespace App\Http\Controllers\API\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(Request $request)
    {
        // Validate the input
        $validator = Validator::make($request->all(), [
            'phone' => 'required',
            'password' => 'required',
        ]);


        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }


        $user = Patient::where('phone', $request->phone )->first();

        if(!$user || !Hash::check($request->password, $user->password)){
            return response()->json(['error' => 'Invalid credentials'], 401);
        }


        $token = $user->createToken('auth_token')->plainTextToken;

        // Return the token in the response
        return response()->json([
            'message' => 'Login successful',
            'token' => $token,
            'user' => new UserResource($user),
        ]);
    }


    public function register(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'email|unique:patients,email',
            'phone' => 'required|string|max:15|unique:patients,phone',
            'password' => 'required|string|min:4|confirmed', // confirm password
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
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
    }

    public function destroy($id)
    {
        // Find the patient by ID
        $patient = Patient::find($id);



        if (!$patient) {
            return response()->json(['error' => 'User not found'], 404);
        }

        // Soft delete the patient
        $patient->delete();

        return response()->json(['message' => 'User deleted successfully']);
    }
}

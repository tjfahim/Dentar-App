<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feedback;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FeedbackController extends Controller
{

    public function index()
    {
        return Feedback::all();
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        // Define the validation rules
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'rating' => 'string'
        ]);



        // Check if validation fails
        if ($validator->fails()) {
            // Validation failed, return errors
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Get the validated data
        $validatedData = $validator->validated();

        // Merge the validated data with additional data (user_id and user_type)
        $feedbackData = array_merge($validatedData, [
            'user_id' => $user->id,
            'user_type' => $user->userType,
        ]);

        // Create a new feedback record
        $feedback = Feedback::create($feedbackData);

        // Return a success response
        return response()->json([
            'message' => 'feedback saved successfully!',
            'data' => $feedback
        ], 201);
    }

}

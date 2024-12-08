<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    public function index()
    {
        return Feedback::all();
    }

    public function store(Request $request)
    {
        // Get the authenticated user
        $user = Auth::user();

        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'description' => 'required|string|min:10|max:1000',
        ]);

        // Merge the validated data with user_id and user_type
        $feedbackData = array_merge($validatedData, [
            'user_id' => $user->id,
            'user_type' => $user->userType,  // Assuming 'userType' is a property of the authenticated user
        ]);

        // Create a new Feedback record
        $feedback = Feedback::create($feedbackData);

        // Return a response
        return response()->json([
            'message' => 'Feedback submitted successfully!',
            'data' => $feedback
        ], 201);
    }
}

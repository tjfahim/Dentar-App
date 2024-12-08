<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // Get the authenticated user
        $user = Auth::user();

        // Validate incoming request
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'user_info' => 'required|max:255',
            'message' => 'required|string|max:1000',
        ]);

        // Merge the validated data with additional data (user_id and user_type)
        $contactData = array_merge($validatedData, [
            'user_id' => $user->id,
            'user_type' => $user->userType,
        ]);

        // Create a new contact record
        $contact = Contact::create($contactData);

        // Return a success response
        return response()->json([
            'message' => 'Contact saved successfully!',
            'data' => $contact
        ], 201);
    }

}

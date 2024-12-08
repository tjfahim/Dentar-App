<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // Validate incoming request
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'user_info' => 'required|max:255',
            'message' => 'required|string|max:1000',
        ]);




        // Create a new contact record
        $contact = Contact::create($validatedData);

        // Return a success response
        return response()->json([
            'message' => 'Contact saved successfully!',
            'data' => $contact
        ], 201);
    }
}

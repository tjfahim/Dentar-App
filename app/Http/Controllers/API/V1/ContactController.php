<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::user();

        // Define the validation rules
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'user_info' => 'required|string|max:255',
            'message' => 'required|string|max:1000',
        ]);


        if ($validator->fails()) {

            return response()->json(['errors' => $validator->errors()], 422);
        }


        $validatedData = $validator->validated();


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

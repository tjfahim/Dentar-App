<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Student;
use App\Jobs\SendNotificationQueue;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::latest()->paginate(15);
        return view('admin.pages.contact.index', compact('contacts'));
    }

    public function update(Request $request, $id)
    {

        $contact = Contact::findOrFail($id);


        $contact->status = $request->input('status');
        $contact->save();

        return redirect()->route('contacts.index')->with('success', 'Contact status updated successfully!');
    }

    public function destroy($id)
    {

        $contact = Contact::findOrFail($id);


        $contact->delete();


        return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully!');
    }


    public function notification_send(Request $request)
    {
        
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'id' => 'required|integer',
            'user_id' => 'required|integer',
            'user_type' => 'required|string',
        ]);

        $contact = Contact::findOrFail($validated['id']);
        $contact->status = 1;
        $contact->save();
    
        $user = match($validated['user_type']) {
            "patient" => Patient::find($validated['user_id']),
            "doctor" => Doctor::find($validated['user_id']),
            "student" => Student::find($validated['user_id']),
            "default" => null,
        };

        if (!$user || !$user->token) {
            return back()->with('error', 'User not found or device token is missing.');
        }

        SendNotificationQueue::dispatch(
                $validated['title'],
                $validated['body'],
                $user,
                // $data
            )->onConnection('database');
      

    
        return back()->with('success', 'Notification sent successfully.');
    }



}

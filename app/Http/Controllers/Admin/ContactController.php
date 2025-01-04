<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

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


}

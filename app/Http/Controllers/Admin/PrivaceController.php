<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PrivacyPolicy;

class PrivaceController extends Controller
{
    public function index()
    {
        $policies = PrivacyPolicy::latest()->paginate(15); // Fetch all privacy policies
        return view('admin.pages.privacy.index', compact('policies'));
    }

    public function create()
    {
        return view('admin.pages.privacy.create'); // Show create form
    }

    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Create a new PrivacyPolicy instance
        $policy = new PrivacyPolicy();
        $policy->title = $request->title;
        $policy->description = $request->description;
        $policy->save();

        // Redirect to the index route with a success message
        return redirect()->route('privacy.index')->with('success', 'Privacy policy created successfully');
    }

    public function show($id)
    {
        // Retrieve the privacy policy by its ID
        $policy = PrivacyPolicy::findOrFail($id);
        return view('admin.pages.privacy.show', compact('policy'));
    }

    public function edit($id)
    {
        // Retrieve the privacy policy by its ID
        $policy = PrivacyPolicy::findOrFail($id);
        return view('admin.pages.privacy.edit', compact('policy'));
    }

    public function update(Request $request, $id)
    {
        // Validate the form data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Find the existing policy
        $policy = PrivacyPolicy::findOrFail($id);
        $policy->title = $request->title;
        $policy->description = $request->description;
        $policy->save();

        // Redirect to the index route with a success message
        return redirect()->route('privacy.index')->with('success', 'Privacy policy updated successfully');
    }

    public function destroy($id)
    {
        // Retrieve the privacy policy by its ID
        $policy = PrivacyPolicy::findOrFail($id);

        // Delete the policy from the database
        $policy->delete();

        // Redirect back with a success message
        return redirect()->route('privacy.index')->with('success', 'Privacy policy deleted successfully');
    }
}

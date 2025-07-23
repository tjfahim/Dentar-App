<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NationalGuideLine;

class NationalGuideLineController extends Controller
{
    public function index()
    {
        $guidelines = NationalGuideline::latest()->paginate(15); // Fetch all guidelines

        
        return view('admin.pages.guideline.index', compact('guidelines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.guideline.create'); // Show create form
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'file' => 'required|file|mimes:pdf', // Validate file
            'status' => 'required|in:active,inactive', // Ensure valid status
        ]);

        // Create a new NationalGuideline model instance
        $guideline = new NationalGuideline();
        $guideline->title = $request->title;
        $guideline->description = $request->description;
        $guideline->status = $request->status == 'active' ? 1 : 0;

        // Handle file upload
        if ($request->hasFile('file')) {
            // Generate a unique file name for the file
            $fileName = time() . '.' . $request->file->extension();

            // Store the file in the 'guidelines' folder in the public storage
            $request->file->move(public_path('guidelines'), $fileName);

            // Save the file path in the database
            $guideline->file = 'guidelines/' . $fileName;
        }

        // Save the guideline data into the database
        $guideline->save();

        // Redirect to the index route with a success message
        return redirect()->route('guideline.index')->with('success', 'Guideline created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Retrieve the guideline by its ID
        $guideline = NationalGuideline::findOrFail($id);

        // Show the guideline details
        return view('admin.pages.guideline.show', compact('guideline'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Retrieve the guideline record by its ID
        $guideline = NationalGuideline::findOrFail($id);

        // Return the edit view with the guideline data
        return view('admin.pages.guideline.edit', compact('guideline'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate the form data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'file' => 'nullable|file|mimes:pdf', // Validate file
            'status' => 'required|in:active,inactive', // Ensure valid status
        ]);

        // Find the existing guideline by its ID
        $guideline = NationalGuideline::findOrFail($id);

        // Update the guideline's fields
        $guideline->title = $request->title;
        $guideline->description = $request->description;
        $guideline->status = $request->status == 'active' ? 1 : 0;

        // Handle file upload if a new file is provided
        if ($request->hasFile('file')) {
            // Delete the old file from storage if it exists
            if ($guideline->file && file_exists(public_path($guideline->file))) {
                unlink(public_path($guideline->file)); // Remove the old file
            }

            // Generate a unique file name for the new file
            $fileName = time() . '.' . $request->file->extension();

            // Store the new file in the 'guidelines' folder in the public storage
            $request->file->move(public_path('guidelines'), $fileName);

            // Update the file path in the database
            $guideline->file = 'guidelines/' . $fileName;
        }

        // Save the updated guideline data into the database
        $guideline->save();

        // Redirect to the index route with a success message
        return redirect()->route('guideline.index')->with('success', 'Guideline updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Retrieve the guideline by its ID
        $guideline = NationalGuideline::findOrFail($id);

        // Delete the file from the server if it exists
        if (file_exists(public_path($guideline->file))) {
            unlink(public_path($guideline->file));
        }

        // Delete the guideline from the database
        $guideline->delete();

        // Redirect back with a success message
        return redirect()->route('guideline.index')->with('success', 'Guideline deleted successfully');
    }
}

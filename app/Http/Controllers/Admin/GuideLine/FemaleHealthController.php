<?php

namespace App\Http\Controllers\Admin\GuideLine;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FemaleHealthGuide;

class FemaleHealthController extends Controller
{
    public function index()
    {
        $guidelines = FemaleHealthGuide::latest()->paginate(15); // Fetch all guidelines

        return view('admin.pages.guideline.femaleHelth.index', compact('guidelines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.guideline.femaleHelth.create'); // Show create form
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

        // Create a new FemaleHealthGuide model instance
        $guideline = new FemaleHealthGuide();
        $guideline->title = $request->title;
        $guideline->description = $request->description;
        $guideline->status = $request->status == 'active' ? 1 : 0;

        // Handle file upload
        if ($request->hasFile('file')) {
            // Generate a unique file name for the file
            $fileName = time() . '.' . $request->file->extension();

            // Store the file in the 'female_health_guides' folder in the public storage
            $request->file->move(public_path('guide/female_health_guides'), $fileName);

            // Save the file path in the database
            $guideline->file = 'guide/female_health_guides/' . $fileName;
        }

        // Save the guideline data into the database
        $guideline->save();

        // Redirect to the index route with a success message
        return redirect()->route('femalehelth.index')->with('success', 'Female health guide created successfully');
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
        $guideline = FemaleHealthGuide::findOrFail($id);

        // Show the guideline details
        return view('admin.pages.guideline.femaleHelth.show', compact('guideline'));
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
        $guideline = FemaleHealthGuide::findOrFail($id);

        // Return the edit view with the guideline data
        return view('admin.pages.guideline.femaleHelth.edit', compact('guideline'));
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
        $guideline = FemaleHealthGuide::findOrFail($id);

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

            // Store the new file in the 'female_health_guides' folder in the public storage
            $request->file->move(public_path('guide/female_health_guides'), $fileName);

            // Update the file path in the database
            $guideline->file = 'guide/female_health_guides/' . $fileName;
        }

        // Save the updated guideline data into the database
        $guideline->save();

        // Redirect to the index route with a success message
        return redirect()->route('femalehelth.index')->with('success', 'Female health guide updated successfully');
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
        $guideline = FemaleHealthGuide::findOrFail($id);

        // Delete the file from the server if it exists
        if (file_exists(public_path($guideline->file))) {
            unlink(public_path($guideline->file));
        }

        // Delete the guideline from the database
        $guideline->delete();

        // Redirect back with a success message
        return redirect()->route('femalehelth.index')->with('success', 'Female health guide deleted successfully');
    }
}

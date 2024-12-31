<?php

namespace App\Http\Controllers\Admin\GuideLine;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChronicCare;

class ChronicsCareController extends Controller
{
    public function index()
    {
        $guidelines = ChronicCare::latest()->paginate(15); // Fetch all chronic care guidelines

        return view('admin.pages.guideline.chronic.index', compact('guidelines'));
    }

    public function create()
    {
        return view('admin.pages.guideline.chronic.create'); // Show create form
    }

    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'file' => 'required|file|mimes:pdf|max:10240', // Validate file
            'status' => 'required|in:active,inactive', // Ensure valid status
        ]);

        // Create a new ChronicCare model instance
        $guideline = new ChronicCare();
        $guideline->title = $request->title;
        $guideline->description = $request->description;
        $guideline->status = $request->status == 'active' ? 1 : 0;

        // Handle file upload
        if ($request->hasFile('file')) {
            $fileName = time() . '.' . $request->file->extension();
            $request->file->move(public_path('guide/chronic_care'), $fileName);
            $guideline->file = 'guide/chronic_care/' . $fileName;
        }

        $guideline->save();

        return redirect()->route('chronic.index')->with('success', 'Chronic care guide created successfully');
    }

    public function show($id)
    {
        $guideline = ChronicCare::findOrFail($id);
        return view('admin.pages.guideline.chronic.show', compact('guideline'));
    }

    public function edit($id)
    {
        $guideline = ChronicCare::findOrFail($id);
        return view('admin.pages.guideline.chronic.edit', compact('guideline'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'file' => 'nullable|file|mimes:pdf|max:10240', // Validate file
            'status' => 'required|in:active,inactive', // Ensure valid status
        ]);

        $guideline = ChronicCare::findOrFail($id);

        $guideline->title = $request->title;
        $guideline->description = $request->description;
        $guideline->status = $request->status == 'active' ? 1 : 0;

        if ($request->hasFile('file')) {
            if ($guideline->file && file_exists(public_path($guideline->file))) {
                unlink(public_path($guideline->file));
            }

            $fileName = time() . '.' . $request->file->extension();
            $request->file->move(public_path('guide/chronic_care'), $fileName);
            $guideline->file = 'guide/chronic_care/' . $fileName;
        }

        $guideline->save();

        return redirect()->route('chronic.index')->with('success', 'Chronic care guide updated successfully');
    }

    public function destroy($id)
    {
        $guideline = ChronicCare::findOrFail($id);

        if (file_exists(public_path($guideline->file))) {
            unlink(public_path($guideline->file));
        }

        $guideline->delete();

        return redirect()->route('chronic.index')->with('success', 'Chronic care guide deleted successfully');
    }
}

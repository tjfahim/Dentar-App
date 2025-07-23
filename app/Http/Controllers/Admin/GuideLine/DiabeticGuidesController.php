<?php

namespace App\Http\Controllers\Admin\GuideLine;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DiabeticGuide;

class DiabeticGuidesController extends Controller
{
    public function index()
    {
        $guidelines = DiabeticGuide::latest()->paginate(15); // Fetch all diabetic guides
        return view('admin.pages.guideline.diabetic.index', compact('guidelines'));
    }

    public function create()
    {
        return view('admin.pages.guideline.diabetic.create'); // Show create form
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'file' => 'required|file|mimes:pdf', // Validate file
            'status' => 'required|in:active,inactive', // Ensure valid status
        ]);

        $guide = new DiabeticGuide();
        $guide->title = $request->title;
        $guide->description = $request->description;
        $guide->status = $request->status == 'active' ? 1 : 0;

        if ($request->hasFile('file')) {
            $fileName = time() . '.' . $request->file->extension();
            $request->file->move(public_path('guide/diabetic_guides'), $fileName);
            $guide->file = 'guide/diabetic_guides/' . $fileName;
        }

        $guide->save();
        return redirect()->route('diabetic.index')->with('success', 'Diabetic guide created successfully');
    }

    public function edit($id)
    {
        $guide = DiabeticGuide::findOrFail($id);
        return view('admin.pages.guideline.diabetic.edit', compact('guide'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'file' => 'nullable|file|mimes:pdf', // Validate file
            'status' => 'required|in:active,inactive', // Ensure valid status
        ]);

        $guide = DiabeticGuide::findOrFail($id);
        $guide->title = $request->title;
        $guide->description = $request->description;
        $guide->status = $request->status == 'active' ? 1 : 0;

        if ($request->hasFile('file')) {
            if ($guide->file && file_exists(public_path($guide->file))) {
                unlink(public_path($guide->file));
            }

            $fileName = time() . '.' . $request->file->extension();
            $request->file->move(public_path('guide/diabetic_guides'), $fileName);
            $guide->file = 'guide/diabetic_guides/' . $fileName;
        }

        $guide->save();
        return redirect()->route('diabetic.index')->with('success', 'Diabetic guide updated successfully');
    }

    public function destroy($id)
    {
        $guide = DiabeticGuide::findOrFail($id);

        if (file_exists(public_path($guide->file))) {
            unlink(public_path($guide->file));
        }

        $guide->delete();
        return redirect()->route('diabetic.index')->with('success', 'Diabetic guide deleted successfully');
    }
}

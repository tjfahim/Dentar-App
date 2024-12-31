<?php

namespace App\Http\Controllers\Admin\GuideLine;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PregnantMotherGuide;

class FemaleMotherController extends Controller
{
    public function index()
    {
        $guidelines = PregnantMotherGuide::latest()->paginate(15); // Fetch all guidelines

        return view('admin.pages.guideline.femaleMother.index', compact('guidelines'));
    }

    public function create()
    {
        return view('admin.pages.guideline.femaleMother.create'); // Show create form
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'file' => 'required|file|mimes:pdf|max:10240',
            'status' => 'required|in:active,inactive',
        ]);

        $guideline = new PregnantMotherGuide();
        $guideline->title = $request->title;
        $guideline->description = $request->description;
        $guideline->status = $request->status == 'active' ? 1 : 0;

        if ($request->hasFile('file')) {
            $fileName = time() . '.' . $request->file->extension();
            $request->file->move(public_path('guide/female_mother_guides'), $fileName);
            $guideline->file = 'guide/female_mother_guides/' . $fileName;
        }

        $guideline->save();

        return redirect()->route('mother.index')->with('success', 'Pregnancy  mother guide created successfully');
    }

    public function edit($id)
    {
        $guideline = PregnantMotherGuide::findOrFail($id);

        return view('admin.pages.guideline.femaleMother.edit', compact('guideline'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'file' => 'nullable|file|mimes:pdf|max:10240',
            'status' => 'required|in:active,inactive',
        ]);

        $guideline = PregnantMotherGuide::findOrFail($id);
        $guideline->title = $request->title;
        $guideline->description = $request->description;
        $guideline->status = $request->status == 'active' ? 1 : 0;

        if ($request->hasFile('file')) {
            if ($guideline->file && file_exists(public_path($guideline->file))) {
                unlink(public_path($guideline->file));
            }

            $fileName = time() . '.' . $request->file->extension();
            $request->file->move(public_path('guide/female_mother_guides'), $fileName);
            $guideline->file = 'guide/female_mother_guides/' . $fileName;
        }

        $guideline->save();

        return redirect()->route('mother.index')->with('success', 'Pregnancy mother guide updated successfully');
    }

    public function destroy($id)
    {
        $guideline = PregnantMotherGuide::findOrFail($id);

        if ($guideline->file && file_exists(public_path($guideline->file))) {
            unlink(public_path($guideline->file));
        }

        $guideline->delete();

        return redirect()->route('mother.index')->with('success', 'Pregnancy  mother guide deleted successfully');
    }
}

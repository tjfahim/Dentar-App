<?php

namespace App\Http\Controllers\Admin\GuideLine;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AntibioticGuideline;

class AntibioticGuidelineController extends Controller
{
    public function index()
    {
        $guidelines = AntibioticGuideline::latest()->paginate(15);
        return view('admin.pages.guideline.antibiotic.index', compact('guidelines'));
    }

    public function create()
    {
        return view('admin.pages.guideline.antibiotic.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'file' => 'required|file|mimes:pdf',
            'status' => 'required|in:active,inactive',
        ]);

        $guideline = new AntibioticGuideline();
        $guideline->title = $request->title;
        $guideline->description = $request->description;
        $guideline->status = $request->status == 'active' ? 1 : 0;

        if ($request->hasFile('file')) {
            $fileName = time() . '.' . $request->file->extension();
            $request->file->move(public_path('guide/antibiotic_guideline'), $fileName);
            $guideline->file = 'guide/antibiotic_guideline/' . $fileName;
        }

        $guideline->save();

        return redirect()->route('antibiotic.index')->with('success', 'Antibiotic guideline created successfully');
    }

    public function show($id)
    {
        $guideline = AntibioticGuideline::findOrFail($id);
        return view('admin.pages.guideline.antibiotic.show', compact('guideline'));
    }

    public function edit($id)
    {
        $guideline = AntibioticGuideline::findOrFail($id);
        return view('admin.pages.guideline.antibiotic.edit', compact('guideline'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'file' => 'nullable|file|mimes:pdf',
            'status' => 'required|in:active,inactive',
        ]);

        $guideline = AntibioticGuideline::findOrFail($id);
        $guideline->title = $request->title;
        $guideline->description = $request->description;
        $guideline->status = $request->status == 'active' ? 1 : 0;

        if ($request->hasFile('file')) {
            if ($guideline->file && file_exists(public_path($guideline->file))) {
                unlink(public_path($guideline->file));
            }
            $fileName = time() . '.' . $request->file->extension();
            $request->file->move(public_path('guide/antibiotic_guideline'), $fileName);
            $guideline->file = 'guide/antibiotic_guideline/' . $fileName;
        }

        $guideline->save();

        return redirect()->route('antibiotic.index')->with('success', 'Antibiotic guideline updated successfully');
    }

    public function destroy($id)
    {
        $guideline = AntibioticGuideline::findOrFail($id);

        if (file_exists(public_path($guideline->file))) {
            unlink(public_path($guideline->file));
        }

        $guideline->delete();

        return redirect()->route('antibiotic.index')->with('success', 'Antibiotic guideline deleted successfully');
    }
}

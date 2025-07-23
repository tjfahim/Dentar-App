<?php

namespace App\Http\Controllers\Admin\GuideLine;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HepaticGuide;

class HepaticGuidesController extends Controller
{
    public function index()
    {
        $guides = HepaticGuide::latest()->paginate(15); // Fetch all hepatic guides
        return view('admin.pages.guideline.hepatic.index', compact('guides'));
    }

    public function create()
    {
        return view('admin.pages.guideline.hepatic.create'); // Show create form
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'file' => 'required|file|mimes:pdf', // Validate file
            'status' => 'required|in:active,inactive', // Ensure valid status
        ]);

        $guide = new HepaticGuide();
        $guide->title = $request->title;
        $guide->description = $request->description;
        $guide->status = $request->status == 'active' ? 1 : 0;

        if ($request->hasFile('file')) {
            $fileName = time() . '.' . $request->file->extension();
            $request->file->move(public_path('guide/hepatic_guides'), $fileName);
            $guide->file = 'guide/hepatic_guides/' . $fileName;
        }

        $guide->save();
        return redirect()->route('hepatic.index')->with('success', 'Hepatic care guide created successfully');
    }

    public function edit($id)
    {
        $guide = HepaticGuide::findOrFail($id);
        return view('admin.pages.guideline.hepatic.edit', compact('guide'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'file' => 'nullable|file|mimes:pdf', // Validate file
            'status' => 'required|in:active,inactive', // Ensure valid status
        ]);

        $guide = HepaticGuide::findOrFail($id);
        $guide->title = $request->title;
        $guide->description = $request->description;
        $guide->status = $request->status == 'active' ? 1 : 0;

        if ($request->hasFile('file')) {
            if ($guide->file && file_exists(public_path($guide->file))) {
                unlink(public_path($guide->file));
            }

            $fileName = time() . '.' . $request->file->extension();
            $request->file->move(public_path('guide/hepatic_guides'), $fileName);
            $guide->file = 'guide/hepatic_guides/' . $fileName;
        }

        $guide->save();
        return redirect()->route('hepatic.index')->with('success', 'Hepatic care guide updated successfully');
    }

    public function destroy($id)
    {
        $guide = HepaticGuide::findOrFail($id);

        if (file_exists(public_path($guide->file))) {
            unlink(public_path($guide->file));
        }

        $guide->delete();
        return redirect()->route('hepatic.index')->with('success', 'Hepatic care guide deleted successfully');
    }
}

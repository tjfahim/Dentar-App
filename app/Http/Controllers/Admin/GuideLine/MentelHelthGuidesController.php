<?php

namespace App\Http\Controllers\Admin\GuideLine;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MentelHelthGuide;

class MentelHelthGuidesController extends Controller
{
    public function index()
    {
        $guidelines = MentelHelthGuide::latest()->paginate(15); // Fetch all mental health guides
        return view('admin.pages.guideline.mentelhelth.index', compact('guidelines'));
    }

    public function create()
    {
        return view('admin.pages.guideline.mentelhelth.create'); // Show create form
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'file' => 'required|file|mimes:pdf', // Validate file
            'status' => 'required|in:active,inactive', // Ensure valid status
        ]);

        $guide = new MentelHelthGuide();
        $guide->title = $request->title;
        $guide->description = $request->description;
        $guide->status = $request->status == 'active' ? 1 : 0;

        if ($request->hasFile('file')) {
            $fileName = time() . '.' . $request->file->extension();
            $request->file->move(public_path('guide/mentelhelth_guides'), $fileName);
            $guide->file = 'guide/mentelhelth_guides/' . $fileName;
        }

        $guide->save();
        return redirect()->route('mentelhelth.index')->with('success', 'Mental Health guide created successfully');
    }

    public function edit($id)
    {
        $guide = MentelHelthGuide::findOrFail($id);
        return view('admin.pages.guideline.mentelhelth.edit', compact('guide'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'file' => 'nullable|file|mimes:pdf', // Validate file
            'status' => 'required|in:active,inactive', // Ensure valid status
        ]);

        $guide = MentelHelthGuide::findOrFail($id);
        $guide->title = $request->title;
        $guide->description = $request->description;
        $guide->status = $request->status == 'active' ? 1 : 0;

        if ($request->hasFile('file')) {
            if ($guide->file && file_exists(public_path($guide->file))) {
                unlink(public_path($guide->file));
            }

            $fileName = time() . '.' . $request->file->extension();
            $request->file->move(public_path('guide/mentelhelth_guides'), $fileName);
            $guide->file = 'guide/mentelhelth_guides/' . $fileName;
        }

        $guide->save();
        return redirect()->route('mentelhelth.index')->with('success', 'Mental Health guide updated successfully');
    }

    public function destroy($id)
    {
        $guide = MentelHelthGuide::findOrFail($id);

        if (file_exists(public_path($guide->file))) {
            unlink(public_path($guide->file));
        }

        $guide->delete();
        return redirect()->route('mentelhelth.index')->with('success', 'Mental Health guide deleted successfully');
    }
}

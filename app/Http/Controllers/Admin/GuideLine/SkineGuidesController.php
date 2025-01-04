<?php

namespace App\Http\Controllers\Admin\GuideLine;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SkinGuide;

class SkineGuidesController extends Controller
{
    public function index()
    {
        $guides = SkinGuide::latest()->paginate(15); // Fetch all skin guides
        return view('admin.pages.guideline.skine.index', compact('guides'));
    }

    public function create()
    {
        return view('admin.pages.guideline.skine.create'); // Show create form
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'file' => 'required|file|mimes:pdf|max:10240', // Validate file
            'status' => 'required|in:active,inactive', // Ensure valid status
        ]);

        $guide = new SkinGuide();
        $guide->title = $request->title;
        $guide->description = $request->description;
        $guide->status = $request->status == 'active' ? 1 : 0;

        if ($request->hasFile('file')) {
            $fileName = time() . '.' . $request->file->extension();
            $request->file->move(public_path('guide/skin_guides'), $fileName);
            $guide->file = 'guide/skin_guides/' . $fileName;
        }

        $guide->save();
        return redirect()->route('skine.index')->with('success', 'Skin care guide created successfully');
    }

    public function edit($id)
    {
        $guide = SkinGuide::findOrFail($id);
        return view('admin.pages.guideline.skine.edit', compact('guide'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'file' => 'nullable|file|mimes:pdf|max:10240', // Validate file
            'status' => 'required|in:active,inactive', // Ensure valid status
        ]);

        $guide = SkinGuide::findOrFail($id);
        $guide->title = $request->title;
        $guide->description = $request->description;
        $guide->status = $request->status == 'active' ? 1 : 0;

        if ($request->hasFile('file')) {
            if ($guide->file && file_exists(public_path($guide->file))) {
                unlink(public_path($guide->file));
            }

            $fileName = time() . '.' . $request->file->extension();
            $request->file->move(public_path('guide/skin_guides'), $fileName);
            $guide->file = 'guide/skin_guides/' . $fileName;
        }

        $guide->save();
        return redirect()->route('skine.index')->with('success', 'Skin care guide updated successfully');
    }

    public function destroy($id)
    {
        $guide = SkinGuide::findOrFail($id);

        if (file_exists(public_path($guide->file))) {
            unlink(public_path($guide->file));
        }

        $guide->delete();
        return redirect()->route('skine.index')->with('success', 'Skin care guide deleted successfully');
    }
}

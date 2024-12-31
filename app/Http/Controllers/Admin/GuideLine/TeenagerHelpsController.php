<?php



namespace App\Http\Controllers\Admin\GuideLine;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TeenagerHelp;

class TeenagerHelpsController extends Controller
{
    public function index()
    {
        $teenagers = TeenagerHelp::latest()->paginate(15);
        return view('admin.pages.guideline.teenager.index', compact('teenagers'));
    }

    public function create()
    {
        return view('admin.pages.guideline.teenager.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'file' => 'required|file|mimes:pdf|max:10240',
            'status' => 'required|in:active,inactive',
        ]);

        $teenager = new TeenagerHelp();
        $teenager->title = $request->title;
        $teenager->description = $request->description;
        $teenager->status = $request->status == 'active' ? 1 : 0;

        if ($request->hasFile('file')) {
            $fileName = time() . '.' . $request->file->extension();
            $request->file->move(public_path('teenager_guides'), $fileName);
            $teenager->file = 'teenager_guides/' . $fileName;
        }

        $teenager->save();

        return redirect()->route('teenager.index')->with('success', 'Teenager help guide created successfully');
    }

    public function edit($id)
    {
        $teenager = TeenagerHelp::findOrFail($id);
        return view('admin.pages.guideline.teenager.edit', compact('teenager'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'file' => 'nullable|file|mimes:pdf|max:10240',
            'status' => 'required|in:active,inactive',
        ]);

        $teenager = TeenagerHelp::findOrFail($id);
        $teenager->title = $request->title;
        $teenager->description = $request->description;
        $teenager->status = $request->status == 'active' ? 1 : 0;

        if ($request->hasFile('file')) {
            if ($teenager->file && file_exists(public_path($teenager->file))) {
                unlink(public_path($teenager->file));
            }

            $fileName = time() . '.' . $request->file->extension();
            $request->file->move(public_path('teenager_guides'), $fileName);
            $teenager->file = 'teenager_guides/' . $fileName;
        }

        $teenager->save();

        return redirect()->route('teenager.index')->with('success', 'Teenager help guide updated successfully');
    }

    public function destroy($id)
    {
        $teenager = TeenagerHelp::findOrFail($id);

        if ($teenager->file && file_exists(public_path($teenager->file))) {
            unlink(public_path($teenager->file));
        }

        $teenager->delete();

        return redirect()->route('teenager.index')->with('success', 'Teenager help guide deleted successfully');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    // Display a listing of the jobs
    public function index()
    {
        $jobs = Job::latest()->paginate(15);
        return view('admin.pages.job.index', compact('jobs'));
    }

    // Show the form for creating a new job
    public function create()
    {
        return view('admin.pages.job.create');
    }

    // Store a newly created job in storage
    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image',
            'company_name' => 'required|string|max:255',
            'job_deadline' => 'required|date',
            'source_url' => 'nullable|url',
            'status' => 'required|in:active,inactive',
        ]);

        // Create a new Job instance
        $job = new Job();
        $job->title = $request->title;
        $job->description = $request->description;
        $job->company_name = $request->company_name;
        $job->job_deadline = $request->job_deadline;
        $job->source_url = $request->source_url;
        $job->status = $request->status == 'active' ? 1 : 0;

        // Handle image upload if there is an image
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/jobs'), $imageName);
            $job->image = 'images/jobs/' . $imageName;
        }

        // Save the job to the database
        $job->save();

        return redirect()->route('job.index')->with('success', 'Job created successfully.');
    }

    // Show the form for editing a job
    public function edit($id)
    {
        $job = Job::findOrFail($id);
        return view('admin.pages.job.edit', compact('job'));
    }

    // Update the specified job in storage
    public function update(Request $request, $id)
    {
        // Validate the form data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'company_name' => 'required|string|max:255',
            'job_deadline' => 'required|date',
            'source_url' => 'nullable|url',
            'status' => 'required|in:active,inactive',
        ]);

        $job = Job::findOrFail($id);
        $job->title = $request->title;
        $job->description = $request->description;
        $job->company_name = $request->company_name;
        $job->job_deadline = $request->job_deadline;
        $job->source_url = $request->source_url;
        $job->status = $request->status == 'active' ? 1 : 0;

        // Handle image upload if there is a new image
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($job->image && file_exists(public_path($job->image))) {
                unlink(public_path($job->image));
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/jobs'), $imageName);
            $job->image = 'images/jobs/' . $imageName;
        }

        $job->save();

        return redirect()->route('job.index')->with('success', 'Job updated successfully.');
    }

    // Remove the specified job from storage
    public function destroy($id)
    {
        $job = Job::findOrFail($id);

        // Delete the image if it exists
        if ($job->image && file_exists(public_path($job->image))) {
            unlink(public_path($job->image));
        }

        // Delete the job
        $job->delete();

        return redirect()->route('job.index')->with('success', 'Job deleted successfully.');
    }
}

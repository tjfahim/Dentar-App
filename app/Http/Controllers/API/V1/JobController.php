<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\JobCollection;
use App\Http\Resources\JobResource;
use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::all();
        return  new JobCollection($jobs);
    }


    public function search()
    {
        $search = request()->input('search');

        $jobs = Job::when($search, function($query, $search){
            return $query->where('title', 'like', '%'.$search.'%')
                ->orWhere('company_name', 'like', '%'.$search.'%');
        })->get();

        return $jobs;



    }

    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'company_name' => 'string|max:255',
            'job_deadline' => 'date',
            'source_url' => 'nullable|url',
        ]);

        // Create a new Job instance
        $job = new Job();
        $job->title = $validatedData['title'];
        $job->description = $validatedData['description'];
        $job->company_name = $validatedData['company_name'];
        $job->job_deadline = $validatedData['job_deadline'];
        $job->source_url = $validatedData['source_url'];


        // Handle image upload if there is an image
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/jobs'), $imageName);
            $job->image = 'images/jobs/' . $imageName;
        }

        // Save the job to the database
        $job->save();

        return response()->json([
            'success' => true,
            'message' => 'Job created successfully.',
            'data' => new JobResource($job)
        ], 201);
    }

    // Show the specified job
    public function show($id)
    {
        $job = Job::find($id);

        if (!$job) {
            return response()->json([
                'success' => false,
                'message' => 'Job not found.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $job,
        ]);
    }

    // Update the specified job in storage
    public function update(Request $request, $id)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'company_name' => 'string|max:255',
            'job_deadline' => 'date',
            'source_url' => 'nullable|url',
        ]);

        $job = Job::find($id);

        if (!$job) {
            return response()->json([
                'success' => false,
                'message' => 'Job not found.',
            ], 404);
        }

        $job->title = $validatedData['title'];
        $job->description = $validatedData['description'];
        $job->company_name = $validatedData['company_name'];
        $job->job_deadline = $validatedData['job_deadline'];
        $job->source_url = $validatedData['source_url'];

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

        return response()->json([
            'success' => true,
            'message' => 'Job updated successfully.',
            'data' => $job,
        ]);
    }

    // Remove the specified job from storage
    public function destroy($id)
    {
        $job = Job::find($id);

        if (!$job) {
            return response()->json([
                'success' => false,
                'message' => 'Job not found.',
            ], 404);
        }

        // Delete the image if it exists
        if ($job->image && file_exists(public_path($job->image))) {
            unlink(public_path($job->image));
        }

        // Delete the job
        $job->delete();

        return response()->json([
            'success' => true,
            'message' => 'Job deleted successfully.',
        ]);
    }
}

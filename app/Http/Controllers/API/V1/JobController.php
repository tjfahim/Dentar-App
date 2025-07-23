<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\JobCollection;
use App\Http\Resources\JobResource;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::whereDate('job_deadline', '>=', Carbon::today())->latest()->get();
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

//     public function store(Request $request)
// {
//     // Perform the validation using Validator::make
//     $validator = Validator::make($request->all(), [
//         'title' => 'required|string|max:255',
//         'description' => 'required|string',
//         'image' => 'nullable|string',
//         'company_name' => 'nullable|string|max:255',
//         'job_deadline' => 'nullable|string',
//         'source_url' => 'nullable|string',
//     ]);

//     // If validation fails, return a 422 response with validation errors
//     if ($validator->fails()) {
//         return response()->json(['error' => $validator->errors()], 422);
//     }



//     $date = date_create($request->job_deadline);

//     $job = Job::create([
//         'title' => $request->title,
//         'description' => $request->description,
//         'image' => $request->image,
//         'company_name' => $request->company_name ?? null,
//         'job_deadline' => date_format($date, 'Y-m-d')  ?? null,
//         'source_url' => $request->source_url ?? null,
//     ]);

//     // Return a success response with the created job data
//     return response()->json([
//         'message' => 'Job created successfully!',
//         'data' => new JobResource($job)
//     ], 201);
// }



public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'image' => 'nullable|string',
        'company_name' => 'nullable|string|max:255',
        'job_deadline' => 'nullable', // Accepts 30/06/2025
        'source_url' => 'nullable|string',
    ]);

    if ($validator->fails()) {
        return response()->json(['error' => $validator->errors()], 422);
    }
    Log::info("job store data: ". json_encode($request->all()));

    // Convert from d/m/Y (30/06/2025) to Y-m-d (2025-06-30)
    $formattedDeadline = $request->job_deadline
        ? Carbon::createFromFormat('d/m/Y', $request->job_deadline)->format('Y-m-d')
        : null;

    $job = Job::create([
        'title' => $request->title,
        'description' => $request->description,
        'image' => $request->image,
        'company_name' => $request->company_name,
        'job_deadline' => $formattedDeadline,
        'source_url' => $request->source_url,
    ]);

    return response()->json([
        'message' => 'Job created successfully!',
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
            'image' => 'nullable|string',
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
            // if ($job->image && file_exists(public_path($job->image))) {
            //     unlink(public_path($job->image));
            // }

            // $imageName = time() . '.' . $request->image->extension();
            // $request->image->move(public_path('images/jobs'), $imageName);
            // $job->image = 'images/jobs/' . $imageName;
            $job->image =  $validatedData['image'];
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

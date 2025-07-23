<?php

namespace App\Http\Controllers\Admin;

use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    // Display a listing of videos
    public function index()
    {
        $videos = Video::latest()->get();
        return view('admin.pages.videos.index', compact('videos'));
    }

    // Show the form for creating a new video
    public function create()
    {
        return view('admin.pages.videos.create');
    }

    // Store a newly created video in storage
   public function store(Request $request)
    {
        // Validate the incoming data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image_poster' => 'required|image',
            'url' => 'required|url',
            'status' => 'required|in:active,inactive',
        ]);
        
        // Convert 'active'/'inactive' to 1/0 for database storage
        $status = $request->status === 'active' ? 1 : 0;
        
        // Prepare the data to be inserted
        $data = $request->only(['title', 'description', 'url']);
        $data['status'] = $status;
    
        // Handle Image Upload (Only if image is uploaded)
        if ($request->hasFile('image_poster')) {
            $data['image_poster'] = $request->file('image_poster')->store('videos_poster', 'public');
        }
    
        // Create the new Video record
        Video::create($data);
    
        // Redirect back with a success message
        return redirect()->route('videomanage.index')->with('success', 'Video created successfully.');
    }


    // Display the specified video
    public function show(Video $video)
    {
        return view('videos.show', compact('video'));
    }

    // Show the form for editing the specified video
    public function edit(Video $videomanage)
    {
      
        return view('admin.pages.videos.edit',[
            'video' => $videomanage
        ]);
    }

    // Update the specified video in storage
   public function update(Request $request, Video $videomanage)
{
    // Validate the incoming data
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'image_poster' => 'nullable|image',
        'url' => 'required|url',
        'status' => 'required|in:active,inactive',
    ]);

    // Convert 'active'/'inactive' to 1/0 for database storage
    $status = $request->status === 'active' ? 1 : 0;

    // Prepare the data to be updated
    $data = $request->only(['title', 'description', 'url']);
    $data['status'] = $status;

    // Handle Image Upload (Only if a new image is uploaded)
    if ($request->hasFile('image_poster')) {
        // Delete old image if exists
        if ($videomanage->image_poster) {
            Storage::disk('public')->delete($videomanage->image_poster);
        }
        // Store the new image
        $data['image_poster'] = $request->file('image_poster')->store('videos_poster', 'public');
    }

    // Update the video record
    $videomanage->update($data);

    // Redirect back with a success message
    return redirect()->route('videomanage.index')->with('success', 'Video updated successfully.');
}


    // Remove the specified video from storage
   public function destroy(Video $videomanage)
    {
        // Check if the video has an associated image and delete it
        if (!empty($videomanage->image_poster) && Storage::disk('public')->exists($videomanage->image_poster)) {
            Storage::disk('public')->delete($videomanage->image_poster);
        }
    
        // Delete the video record from the database
        $videomanage->delete();
    
        // Redirect back with a success message
        return redirect()->route('videomanage.index')->with('success', 'Video deleted successfully.');
    }

}

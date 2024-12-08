<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $blogs_student = Blog::where('user_type', 'student')->with('student_user')->get();
        $blogs_docoter = Blog::where('user_type', 'doctor')->with('doctor_user')->get();

        $blogs = $blogs_student->merge($blogs_docoter);

        $blogs = $blogs->sortBy('id')->values();

        return $blogs;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

public function store(Request $request)
{
    // Validate incoming data
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'images' => 'array|nullable', // Accepts array of images
        'videos' => 'array|nullable', // Accepts array of videos
    ]);

    // Decode base64 images and videos and store them in the database
    $images = [];
    $videos = [];

    $user = Auth::user();
    return $user->userType;

    // Handle base64 image upload
    if ($request->has('images')) {
        foreach ($request->images as $image) {
            // Validate if the image is a valid base64 string
            if (preg_match('/^data:image\/(\w+);base64,/', $image)) {
                $imageData = substr($image, strpos($image, ',') + 1);
                $imageData = base64_decode($imageData);

                // Generate a unique name for the image file
                $imageName = uniqid('image_') . '.png';

                // Store the image to the public directory
                \Storage::disk('public')->put('images/' . $imageName, $imageData);

                // Save the image path to the images array
                $images[] = asset('storage/images/' . $imageName);
            }
        }
    }

    // Handle base64 video upload
    if ($request->has('videos')) {
        foreach ($request->videos as $video) {
            // Validate if the video is a valid base64 string
            if (preg_match('/^data:video\/(\w+);base64,/', $video)) {
                $videoData = substr($video, strpos($video, ',') + 1);
                $videoData = base64_decode($videoData);

                // Generate a unique name for the video file
                $videoName = uniqid('video_') . '.mp4';

                // Store the video to the public directory
                \Storage::disk('public')->put('videos/' . $videoName, $videoData);

                // Save the video path to the videos array
                $videos[] = asset('storage/videos/' . $videoName);
            }
        }
    }

    // Create a new blog post with the images and videos as JSON
    $blog = Blog::create([
        'title' => $validatedData['title'],
        'content' => $validatedData['content'],
        'user_type' => Auth::user()->userType,
        'user_id' => Auth::id(),
        'images' => $images, // Store the images array as JSON
        'videos' => $videos, // Store the videos array as JSON
    ]);

    return response()->json([
        'message' => 'Blog created successfully',
        'data' => $blog,
    ], 201);
}


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = Blog::find($id);



        if(!$blog){
            return response()->json([
                'message' => 'Undefine blog',
            ]);
        }

        $blog->load('comments');

        return $blog;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Get the authenticated user
        $user = Auth::user();

        // Validate the incoming data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Find the blog post by ID
        $blog = Blog::find($id);

        // Check if the blog post exists
        if (!$blog) {
            return response()->json([
                'message' => 'Blog post not found',
            ], 404);
        }

        // Ensure that the authenticated user is the owner of the blog post
        if ($blog->user_id !== $user->id) {
            return response()->json([
                'message' => 'You are not authorized to update this blog post',
            ], 403);
        }

        // Update the blog post with the validated data
        $blog->update([
            'title' => $request->title,
            'content' => $request->content,
            'user_type' => $user->userType,  // Optionally, you can also update the user type, if required
            'user_id' => $user->id,  // Optionally, you can also update the user ID, if required
        ]);

        // Return the updated blog as JSON response
        return response()->json([
            'message' => 'Blog updated successfully',
            'data' => $blog,
        ], 200);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }




    public function addComment(Request $request, $id)
    {
        // Validate the comment
        $validator = Validator::make($request->all(), [
            'comment' => 'required|string|min:15',
        ]);

        // If validation fails, return error response
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        // Find the blog by ID
        $blog = Blog::find($id);

        if (!$blog) {
            return response()->json([
                'message' => 'Undefined blog',
            ], 404);
        }

        // Get the authenticated user
        $user = Auth::user();

        // Add the comment to the blog
        $comment = $blog->comments()->create([
            'comment' => $request->comment,
            'user_id' => $user->id,
            'user_type' => $user->userType, // Save the user's model type
        ]);

        // Return success response
        return response()->json([
            'message' => 'Comment added successfully',
            'data' => $comment,
        ], 201);
    }

}

<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\BlogResource;
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

        $blogs_student = Blog::where('user_type', 'student')
            ->with('student_user')
            ->orderBy('created_at', 'desc')
            ->get();
        $blogs_doctor = Blog::where('user_type', 'doctor')
            ->with('doctor_user')
            ->orderBy('created_at', 'desc')
            ->get();

        $blogs = $blogs_student->merge($blogs_doctor);

        $blogs = $blogs->sortByDesc('id')->values();

        return response()->json([
            'success' => true,
            'message' => "All blogs lists",
            'data' => BlogResource::collection($blogs)
        ], 200);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

public function store(Request $request)
{


     $validator = Validator::make($request->all(), [
        'title' => 'required|string',
        'content' => 'required|string',
        'file' => 'string|nullable',
    ]);



    if ($validator->fails()) {
        return response()->json([
            'errors' => $validator->errors(),
        ], 422);
    }

    // $allfiles = [];
    // if($request->has('file')){
    //     $files = $request->file;

    //     foreach($files as $key => $value){
    //         $file = time() . $key. '.'. $value->getClientOriginalExtension();

    //         $path = public_path('images/blog');

    //         $fullPath = 'images/blog/' . $file;


    //         array_push($allfiles, $fullPath);

    //         $value->move($path, $file);
    //     }
    // }


    $files = explode(',', $request->file);




    // Create a new blog post with the images and videos as JSON
    $blog = Blog::create([
        'title' => $request->title,
        'content' => $request->content,
        'user_type' => Auth::user()->userType,
        'user_id' => Auth::user()->id,
        'file' => json_encode($files) ?? ''
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

        return new BlogResource($blog);
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
    $validator = Validator::make($request->all(), [
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'file' => 'string|nullable',
    ]);


    if ($validator->fails()) {
        return response()->json([
            'errors' => $validator->errors(),
        ], 422);
    }

    $blog = Blog::findOrFail($id); // If the blog post doesn't exist, it will throw a 404 error

    // If files are provided, process and save them
    $allfiles = $blog->file ? json_decode($blog->file, true) : []; // Keep existing files if no new ones are provided

    if ($request->has('file')) {
        $files = $request->file('file');

        // If you are updating files, you can either replace them or add to the existing ones
        foreach ($files as $key => $value) {
            $file = time() . $key . '.' . $value->getClientOriginalExtension();
            $path = public_path('images/blog');
            $fullPath = 'images/blog/' . $file;

            // Add the new file to the list
            array_push($allfiles, $fullPath);

            // Move the file to the server
            $value->move($path, $file);
        }
    }

    // Update the blog post with the new data
    $blog->update([
        'title' => $validator['title'],
        'content' => $validator['content'],
        'user_type' => Auth::user()->userType,
        'user_id' => Auth::user()->id,
        'file' => json_encode($allfiles) // Save the updated list of files
    ]);

    return response()->json([
        'message' => 'Blog updated successfully',
        'data' => new BlogResource($blog),
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
        // Find the blog post by its ID
        $blog = Blog::findOrFail($id); // If not found, it will throw a 404 error

        // Optionally, delete associated files if needed
        if ($blog->file) {
            $files = json_decode($blog->file, true);

            // Loop through the file paths and delete the files from the server
            foreach ($files as $file) {
                $filePath = public_path($file);

                if (file_exists($filePath)) {
                    unlink($filePath); // Delete the file
                }
            }
        }

        // Delete the blog post from the database
        $blog->delete();

        return response()->json([
            'message' => 'Blog deleted successfully',
        ], 200);
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

<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        $user = Auth::user();
         // Validate the incoming data
         $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Create new blog post based on the validated data
        $blog = Blog::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_type' => $user->userType,
            'user_id' => $user->id
        ]);

        // Return the created blog as JSON response
        // return response()->json($blog, 201);
        return response()->json([
            'message' => 'Blog added successfully',
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
                'message' => 'Blog added successfully',
                'data' => $blog,
            ]);
        }

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
        //
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
}

<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\BlogResource;
use App\Models\Blog;
use App\Models\BlogComment;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Svg\Tag\Rect;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter = null;
        $filter = $request->input('filter');

        if($filter === 'all' || !$filter){
            // $blogs_student = Blog::where('user_type', 'student')
            //     ->with('student_user')
            //     ->orderBy('created_at', 'desc')
            //     ->get();
            $blogs_doctor = Blog::where('user_type', 'doctor')
                ->with('doctor_user')
                ->orderBy('created_at', 'desc')
                ->get();
                $blogs = $blogs_doctor;
        }else{
            $blogs = Blog::where('user_id', $filter)->latest()->get();
        }



        // $blogs = $blogs_student->merge($blogs_doctor);

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
        $blog = $blog->load('comments.replay');



        foreach($blog->comments as  $comment){
            switch($comment->user_type){
                case "doctor":
                    $comment  = $comment->load('doctor');
                    break;
                case 'patient':
                    $comment = $comment->load('patient');
                    break;
                case'student':
                    $comment = $comment->load('student');
                    break;
            }
        }



        switch($blog->user_type){
            case 'patient':
                $blog = $blog->load('patient_user');
            case 'student':
                $blog = $blog->load('student_user');
            case 'doctor' :
                $blog = $blog->load('doctor_user');
        }




        return response()->json([
            'message' => 'Blog with all comments',
            'success' => true,
            'data' => BlogResource::make($blog),
        ]);


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

    $blog = Blog::findOrFail($id);

    if(Auth::user()->id !== $blog->user_id){
        return response()->json([
           'message' => 'Unauthorized to update this blog',
        ], 401);
    }



    if($request->has('file')){
        $files = json_decode($blog->file);
        $files = explode(',', $files);

        foreach($files as $file){
            $filePath = public_path($file);
            if(file_exists($filePath)){
                unlink($filePath);
            }
        }
    }



    $blog->update([
        'title' => $request->title,
        'content' => $request->content,
        'user_type' => Auth::user()->userType,
        'user_id' => Auth::user()->id,
        'file' => $request->file ? json_encode($request->file) : $blog->file
    ]);



    $blog = $blog->load('doctor_user');


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

        $blog = Blog::findOrFail($id);


            if(Auth::user()->id !== $blog->user_id){
                return response()->json([
                   'message' => 'Unauthorized to delete this blog',
                ], 401);
            }


            $files = json_decode($blog->file);
            $files = explode(',', $files);

            foreach($files as $file){
                $filePath = public_path($file);
                if(file_exists($filePath)){
                    unlink($filePath);
                }
            }



        $blog->delete();

        return response()->json([
            'message' => 'Blog deleted successfully',
        ], 200);
    }



    public function addComment(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'comment' => 'required|string',
        ]);


        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation error',
                'errors' => $validator->errors(),
            ], 422);
        }


        $blog = Blog::find($id);

        if (!$blog) {
            return response()->json([
                'message' => 'Undefined blog',
            ], 404);
        }


        $user = Auth::user();
        $comment = $blog->comments()->create([
            'comment' => $request->comment,
            'user_id' => $user->id,
            'user_type' => $user->userType,
        ]);


        return response()->json([
            'message' => 'Comment added successfully',
            'data' => $comment,
        ], 201);
    }


    public function updateComment(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'comment' => 'required|string',
        ]);


        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation error',
                'errors' => $validator->errors(),
            ], 422);
        }


        $comment = BlogComment::find($id);

        if (!$comment) {
            return response()->json([
                'message' => 'Undefined comment',
            ], 404);
        }


        $user = Auth::user();
        $comment = $comment->update([
            'comment' => $request->comment,
            'user_id' => $user->id,
            'user_type' => $user->userType,
        ]);


        return response()->json([
            'message' => 'Comment update successfully',
            'data' => $comment,
        ], 201);
    }

    public function commentDelete(Request $request, $id)
    {

        $user = Auth::user();

        $comment = BlogComment::find($id);

        if(!$comment){
            return response()->json([
               'message' => 'Undefined comment',
            ], 404);
        }

        if($user->id !== $comment->user_id){
            return response()->json([
               'message' => 'You can not delete this comment',
            ], 401);
        }


        $comment->replay()->delete();
        $comment->delete();


        return response()->json([
           'message' => 'Comment deleted successfully',
        ], 200);

    }

    public function replayComment(Request $request, $b_id, $c_id)
    {
        $validator = Validator::make($request->all(), [
            'comment' => 'required|string',
        ]);


        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation error',
                'errors' => $validator->errors(),
            ], 422);
        }


        $blog = Blog::find($b_id);
        $comment = $blog->comments()->find($c_id);

        if (!$blog || !$comment) {
            return response()->json([
                'message' => 'Undefined blog or comment',
            ], 404);
        }

        $user = Auth::user();
        $comment = $blog->comments()->create([
            'comment' => $request->comment,
            'user_id' => $user->id,
            'user_type' => $user->userType,
            'comment_id' => $comment->id
        ]);


        return response()->json([
            'message' => 'Comment replay  successfully',
            'data' => $comment,
        ], 201);

    }

}

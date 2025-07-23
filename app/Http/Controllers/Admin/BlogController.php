<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::latest()->paginate(10);
        return view('admin.pages.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validate the form data
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required',
        'files' => 'nullable|array', // Ensure 'files' is an array
        'files.*' => 'file|file', // Accepting image and document files
        'status' => 'required|boolean',
    ]);

    // Prepare data for the blog
    $data = $request->only(['title', 'content', 'status']);

    // Handle multiple file uploads
    $allFiles = [];
    if ($request->hasFile('files')) {
        foreach ($request->file('files') as $key => $file) {
            // Generate a unique name for each file
            $fileName = time() . $key . '.' . $file->getClientOriginalExtension();
            
            // Save the file to public storage
            $filePath = 'files/all/' . $fileName;
            $file->move(public_path('files/all/'), $fileName);
            
            // Store the file path in the array
            $allFiles[] = $filePath;
        }
    }
    

    
   
   
    
    $data['user_id'] = auth()->id();
    $data['user_type'] = auth()->user()->role;
    
    

    // Store the file paths as a JSON array
    $data['file'] = json_encode($allFiles);

    // Create the blog record
    Blog::create($data);

    // Redirect back to the blog listing page with a success message
    return redirect()->route('blog_manage.index')->with('success', 'Blog created successfully.');
}


    /**
     * Display the specified resource.
     */
    public function show(Blog $blog_manage)
    {
        // return $blog_manage;
        return view('admin.pages.blog.show', [
                'blog' => $blog_manage
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog_manage)
    {
        return view('admin.pages.blog.edit', [
            'blog' => $blog_manage    
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, Blog $blog_manage)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required',
        'files' => 'nullable|array', // for multiple files
        'files.*' => 'nullable|file', // validation for multiple files
        'status' => 'required|boolean',
    ]);

    $data = $request->only(['title', 'content', 'status']);

    // Handle multiple file uploads
    $allFiles = [];
    if ($request->hasFile('files')) {
        $existingFiles = $blog_manage->file ? json_decode($blog_manage->file, true) : [];

        foreach ($request->file('files') as $key => $file) {
            $fileName = time() . $key . '.' . $file->getClientOriginalExtension();
            $filePath = 'files/all/' . $fileName;

            // Move file to public path
            $file->move(public_path('files/all/'), $fileName);

            $allFiles[] = $filePath;
        }

        // Merge old and new files
        $data['file'] = json_encode(array_merge($existingFiles, $allFiles));
    }

    $blog_manage->update($data);

    return redirect()->route('blog_manage.index')->with('success', 'Blog updated successfully.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog_manage)
    {
        // Check if files exist and delete them from storage
        if ($blog_manage->file) {
            // Decode the JSON file paths into an array
            $files = json_decode($blog_manage->file, true);
    
            foreach ($files as $file) {
                // Check if the file exists before trying to delete it
                if (file_exists(public_path($file))) {
                    unlink(public_path($file));  // Delete the file
                }
            }
        }
    
        // Delete the blog record from the database
        $blog_manage->delete();
    
        return redirect()->route('blog_manage.index')->with('success', 'Blog and associated files deleted successfully.');
    }

}

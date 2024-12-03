<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.pages.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate image
            'status' => 'required|in:active,inactive', // Ensure valid status
        ]);



        // Create a new Slider model instance
        $slider = new Slider();
        $slider->title = $request->title;
        $slider->description = $request->description;
        $slider->status = $request->status == 'active' ?  1 : 0;

        // Handle image upload
        if ($request->hasFile('image')) {
            // Generate a unique file name for the image
            $imageName = time() . '.' . $request->image->extension();

            // Store the image in the 'sliders' folder in the public storage
            $request->image->move(public_path('images/sliders'), $imageName);

            // Save the image path in the database
            $slider->image = 'images/sliders/' . $imageName;
        }

        // Save the slider data into the database
        $slider->save();

        // Redirect to the index route (list of sliders) with a success message
        return redirect()->route('slider.index')->with('success', 'Slider created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Retrieve the slider record by its ID
        $slider = Slider::findOrFail($id);

        // Return the edit view with the slider data
        return view('admin.pages.slider.edit', compact('slider'));
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
        // Validate the form data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Image is optional during update
            'status' => 'required|in:active,inactive', // Ensure valid status
        ]);

        // Find the existing slider by its ID
        $slider = Slider::findOrFail($id); // Find or fail if the slider doesn't exist

        // Update the slider's fields
        $slider->title = $request->title;
        $slider->description = $request->description;
        $slider->status = $request->status == 'active' ? 1 : 0;

        // Handle image upload if a new image is provided
        if ($request->hasFile('image')) {
            // Delete the old image from storage if it exists
            if ($slider->image && file_exists(public_path($slider->image))) {
                unlink(public_path($slider->image)); // Remove the old image file
            }

            // Generate a unique file name for the new image
            $imageName = time() . '.' . $request->image->extension();

            // Store the new image in the 'sliders' folder in the public storage
            $request->image->move(public_path('images/sliders'), $imageName);

            // Update the image path in the database
            $slider->image = 'images/sliders/' . $imageName;
        }

        // Save the updated slider data into the database
        $slider->save();

        // Redirect to the index route (list of sliders) with a success message
        return redirect()->route('slider.index')->with('success', 'Slider updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Retrieve the slider by its ID
        $slider = Slider::findOrFail($id);

        // Delete the image from the server if it exists
        if (file_exists(public_path($slider->image))) {
            unlink(public_path($slider->image));
        }

        // Delete the slider from the database
        $slider->delete();

        // Redirect back with a success message
        return redirect()->route('slider.index')->with('success', 'Slider deleted successfully');
    }
}

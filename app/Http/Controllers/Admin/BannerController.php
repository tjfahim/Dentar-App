<?php

namespace App\Http\Controllers\Admin;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    /**
     * Display a listing of the banners.
     */
    public function index()
    {
        $banners = Banner::orderBy('status', 'desc')  // Order by status, active (1) first
                        ->latest('updated_at')  // Order by updated_at within each status group
                        ->paginate(10);
        return view('admin.pages.banner.index', compact('banners'));
    }

    /**
     * Show the form for creating a new banner.
     */
    public function create()
    {
        return view('admin.pages.banner.create');
    }

    /**
     * Store a newly created banner in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'image' => 'required|image',
            'status' => 'required|boolean',
        ]);
        
        if ($request->status) {
            // Set all other banners to inactive
            Banner::where('status', true)->update(['status' => false]);
        }

        // Handle file upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('banners', 'public');
        }

        // Store banner data in the database
        Banner::create([
            'image' => $imagePath,
            'status' => $request->status,
        ]);

        return redirect()->route('banner.index')->with('success', 'Banner created successfully.');
    }

    /**
     * Show the form for editing the specified banner.
     */
    public function edit(Banner $banner)
    {
        return view('admin.pages.banner.edit', compact('banner'));
    }

    /**
     * Update the specified banner in storage.
     */
   public function update(Request $request, Banner $banner)
{
    // Validate the request data
    $request->validate([
        'image' => 'nullable|image', // Image is optional during update
        'status' => 'required|boolean',
    ]);

    // If the status is being set to active, make all other banners inactive
    if ($request->status) {
        // Set all other banners to inactive
        Banner::where('status', true)->where('id', '!=', $banner->id)->update(['status' => false]);
    }

    // Handle file upload if an image is provided
    if ($request->hasFile('image')) {
        // Delete the old image from storage if it's being replaced
        if ($banner->image) {
            Storage::disk('public')->delete($banner->image);
        }

        // Store the new image
        $imagePath = $request->file('image')->store('banners', 'public');
    } else {
        // If no new image is uploaded, keep the old image
        $imagePath = $banner->image;
    }

    // Update the banner data
    $banner->update([
        'image' => $imagePath,
        'status' => $request->status,
    ]);

    return redirect()->route('banner.index')->with('success', 'Banner updated successfully.');
}


    /**
     * Remove the specified banner from storage.
     */
    public function destroy(Banner $banner)
    {
        // Delete image from storage
        if ($banner->image && Storage::disk('public')->exists($banner->image)) {
            Storage::disk('public')->delete($banner->image);
        }

        // Delete banner record from database
        $banner->delete();

        return redirect()->route('banner.index')->with('success', 'Banner deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LiveNews;

class AnnouncementController extends Controller
{
    public function index()
    {
        return view('admin.pages.announcement.index', [
            'announcements' => LiveNews::all(),
        ]);
    }
    
    public function create()
    {
         return view('admin.pages.announcement.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'news' => 'required|string|max:255',
            'status' => 'required|in:active,inactive',
        ]);
    
        LiveNews::create([
            'news' => $request->news,
            'status' => $request->status,
        ]);
    
        return redirect()->route('announcements.index')->with('success', 'Announcement created successfully!');
    }
    
    public function edit(LiveNews $announcement){
        return view('admin.pages.announcement.edit', compact('announcement'));
    }
    
     public function update(Request $request, LiveNews $announcement)
    {
        $request->validate([
            'news' => 'required|string|max:255',
            'status' => 'required|in:active,inactive',
        ]);
    
        $announcement->update([
            'news' => $request->news,
            'status' => $request->status,
        ]);
    
        return redirect()->route('announcements.index')->with('success', 'Announcement update successfully!');
    }
    
    public function destroy(LiveNews $announcement)
    {
        $announcement->delete();
        
        return redirect()->route('announcements.index')->with('success', 'Announcement deleted successfully!');
    }
}

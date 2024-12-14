<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::latest()->paginate(15);
        return view('admin.pages.feedback.index', compact('feedbacks'));
    }



    public function update(Request $request, $id)
    {
        $feedback = Feedback::findOrFail($id);
        $feedback->status = $request->input('status');
        $feedback->save();

        return redirect()->route('feedback.index')->with('success', 'Feedback status updated successfully!');
    }

}

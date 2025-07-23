<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\SendNotificationQueue;
use App\Models\Doctor;
use App\Models\Feedback;
use App\Models\Patient;
use App\Models\Student;
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
    
    public function destroy(Feedback $feedback)
    {
        $feedback->delete();
        return redirect()->route('feedback.index')->with('success', 'Feedback Deleted successfully!');
    }

    public function notification_send(Request $request)
    {
        
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'id' => 'required|integer',
            'user_id' => 'required|integer',
            'user_type' => 'required|string',
        ]);

        $feedback = Feedback::findOrFail($validated['id']);
        $feedback->status = 1;
        $feedback->save();
    
        $user = match($validated['user_type']) {
            "patient" => Patient::find($validated['user_id']),
            "doctor" => Doctor::find($validated['user_id']),
            "student" => Student::find($validated['user_id']),
            "default" => null,
        };

        if (!$user || !$user->token) {
            return back()->with('error', 'User not found or device token is missing.');
        }

        SendNotificationQueue::dispatch(
                $validated['title'],
                $validated['body'],
                $user,
                // $data
            )->onConnection('database');
      

    
        return back()->with('success', 'Notification sent successfully.');
    }

}

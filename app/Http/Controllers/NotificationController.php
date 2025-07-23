<?php

namespace App\Http\Controllers;


use App\Models\Doctor;

use App\Traits\PushNotification;
use Illuminate\Http\Request;
use App\Models\Notification;
use App\Http\Resources\NotificationResource;
use App\Models\CustomeNotification;
use App\Jobs\SendNotificationQueue;

class NotificationController extends Controller
{
    use PushNotification;
    public function index() {

        $token = "f0TTZAJORRexooN4dG41Yv:APA91bEEeEEhfMx5hpKdIBgTjwMkOB_HCj76-yXf7wKo8CbzzxQSYJ4I5erDT7wwpE_smzo07fQFij_LR5fRFtP6InRGttJ-asuS55rwyaCib9bNIJ24DjY";
        $title = "Notification title";
        $body =  "This is body of notification";

        $data = [
            'key1' => 'value1',
            'key2' => 'value2',
        ];

        $response = $this->sendNotification($token, $title, $body, $data);

        return response()->json(['success' => true, 'response' => $response]);
    }


    public function doctornotification()
    {
        $attributes = request()->validate([
            'title' => ['required', 'string'],
            'body' => ['required', 'string'],
            'ids' => ['required', 'string'],
        ]);

        $ids = explode(",", $attributes['ids']);

        $doctors = [];

        
        foreach($ids as $id) {
            $doctor = Doctor::find($id);  
            if ($doctor) {
                $doctors[] = $doctor; 
            }
        }
        $data = ['payload' => "custom message for doctor"];

        foreach ($doctors as $doctor) {
            // Skip if token is null or empty
            if (empty($doctor->token)) {
                continue;
            }
            \Log::info("Dispatching notification to Doctor ID {$doctor->id}");
            SendNotificationQueue::dispatch(
                $attributes['title'],
                $attributes['body'],
                $doctor,
                // $data
            )->onConnection('database');
        }

       
        unset($attributes['ids']);

       
        CustomeNotification::create($attributes);
        
        return response()->json([
            'status' => 'success',
            'message' => 'Notification Send Successfully!',
            'data' => $attributes
        ]);
    }
    
     
}

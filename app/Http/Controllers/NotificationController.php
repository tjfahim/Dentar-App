<?php

namespace App\Http\Controllers;

use App\Traits\PushNotification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    use PushNotification;
    public function index() {

        $token = "dYp-x2tAT0SexWX59Y-gYj:APA91bET8xyUUprBtD2gpeX8kmqS5iu8dOUWLM9Iz3UhChpoFn8u0d15Rcc41f6Pcm2luMd8ZkkrLaipCPFMXyTXyr-ChbQ0qpdZ7YqAjtD6V_OFEiEg8BA";
        $title = "Notification title";
        $body =  "This is body of notification";

        $data = [
            'key1' => 'value1',
            'key2' => 'value2',
        ];

        $response = $this->sendNotification($token, $title, $body, $data);

        return response()->json(['success' => true, 'response' => $response]);
    }
}

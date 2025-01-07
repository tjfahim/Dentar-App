<?php

namespace App\Http\Controllers;

use App\Traits\PushNotification;
use Illuminate\Http\Request;

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
}

<?php

namespace App\Services;

use App\Traits\FirebaseNotificationTrait;

class NotificationService
{
    use FirebaseNotificationTrait;

    public function notifyUsers(array $deviceTokens)
    {
        $title = "New Alert!";
        $body = "You have a new message.";
        $data = ['key' => 'value']; // Optional custom data payload

        return $this->sendFirebaseNotification($deviceTokens, $title, $body, $data);
    }
}

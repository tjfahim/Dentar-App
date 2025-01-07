<?php

namespace App\Traits;

use App\Services\NotificationService;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Exception\FirebaseException;

trait FirebaseNotificationTrait
{
    protected function sendFirebaseNotification(array $deviceTokens, string $title, string $body, array $data = [])
    {
        try {
            // Initialize Firebase
            $factory = (new Factory)
                ->withServiceAccount(storage_path('firebase_credentials.json'));
            $messaging = $factory->createMessaging();

            // Create Notification
            $notification = [
                'title' => $title,
                'body'  => $body,
            ];

            // Cloud Message
            $message = CloudMessage::fromArray([
                'notification' => $notification,
                'data'         => $data, // Custom data payload
                'tokens'       => $deviceTokens, // FCM tokens
            ]);

            // Send Message
            // $response = $messaging->sendMulticast($message);
            $deviceTokens = [
                'token1',
                'token2',
                // Add Firebase device tokens here
            ];

            $notificationService = new NotificationService();
            $response = $notificationService->notifyUsers($deviceTokens);

            echo $response;

            return $response->successes()->count() . " notifications sent successfully.";
        } catch (FirebaseException $e) {
            return "Error sending notification: " . $e->getMessage();
        }
    }
}

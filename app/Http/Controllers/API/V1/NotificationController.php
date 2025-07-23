<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\NotificationResource;
use App\Models\Notification;
use App\Traits\PushNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    use PushNotification;
    public function index()
    {
        $user = Auth::user();



        $unread = $user->notifications()
            ->where('read', false)
            ->where('user_type', $user->userType)
            ->count();

        $notifi = $user->notifications()
                ->where('user_type', $user->userType)
                ->latest()
                ->get();


        return response()->json([
            'message' => 'Notification list',
            'success' => true,
            'unread' => $unread,
            'data' => NotificationResource::collection($notifi),
            'total' => $user->notifications()->where('user_type', $user->userType)->count()
        ]);

        // return  NotificationResource::collection( Notification::latest()->get());
    }

    public function read($id)
    {
        $notifi = Notification::find($id);

        if (!$notifi) {
            return response()->json([
               'message' => 'Notification not found',
            ], 404);
        }

        $notifi->read = true;
        $notifi->save();

        return response()->json([
           'message' => 'Notification read',
           'success' => true,
            'data' => new NotificationResource($notifi),
        ]);
    }
    
     public function updatenotification(Request $request)
    {
        // Get the authenticated user
        $user = $request->user();

        // Update all notifications for the authenticated user
        $updatedNotifications = Notification::where('user_id', $user->id)
                                            ->update(['read' => 1]);

        // Check if any notifications were updated
        if ($updatedNotifications) {
            return response()->json([
                'message' => 'All notifications marked as read successfully',
            ]);
        }

        // If no notifications were updated, return a message
        return response()->json([
            'message' => 'No notifications found for this user',
        ]);
    }
}

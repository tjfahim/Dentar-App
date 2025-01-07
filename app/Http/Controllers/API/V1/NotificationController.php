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
}

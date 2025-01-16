<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\SendNotificationQueue;
use App\Models\CustomeNotification;
use App\Traits\PushNotification;
use Illuminate\Http\Request;

class CustomNotificationController extends Controller
{

    public function index()
    {
        $notifications = CustomeNotification::latest()->get();



        return view('admin.pages.customeNotification.index', [
            'notifications' => $notifications,
            'options' => CustomeNotification::getFilterOptions()
        ]);
    }

    public function create()
    {

    }

    public function store()
    {
        $attributes = request()->validate([
            'title' => ['required', 'string'],
            'body' => ['required', 'string'],
            'option' => ['required']
        ]);

        $options = CustomeNotification::$filter_by;

        $method =  $options[$attributes['option']];

        if(method_exists(CustomeNotification::class, $method)){
            $users =  CustomeNotification::$method();
        }

        foreach ($users as $user){
            SendNotificationQueue::dispatch($attributes['title'], $attributes['body'], $user)->onConnection('database');
        }

        array_pop($attributes);
        CustomeNotification::create($attributes);

        return redirect()->route('notifications_system.index')->with('success', 'Notification send successfully!');

    }


    public function destroy(CustomeNotification $notifications_system)
    {
        $notifications_system->delete();
        return redirect()->route('notifications_system.index')->with('success', 'Notification delete successfully!');
    }


}

<?php

namespace App\Jobs;

use App\Models\Notification;
use App\Traits\PushNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class SendNotificationQueue implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    use PushNotification;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(public $title, public $body, public $user)
    {

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Notification::create([
            'title' => $this->title,
            'body' => $this->body,
            'user_id' => $this->user->id,
            'user_type' => $this->user->userType,
        ]);

        $this->sendNotification($this->user->token, $this->title, $this->body);
        Log::info($this->title. "  sent notification");
    }
}

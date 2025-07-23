<?php

namespace App\Jobs;

use App\Models\Notification;
use App\Traits\PushNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class SendNotificationQueue implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    use PushNotification;

    public string $title;
    public string $body;
    public object $user;
    public array $data;

    /**
     * Create a new job instance.
     */
    public function __construct(string $title, string $body, object $user, array $data = [])
    {
        $this->title = $title;
        $this->body = $body;
        $this->user = $user;
        $this->data = $data;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Notification::create([
            'title' => $this->title,
            'body' => $this->body,
            'user_id' => $this->user->id,
            'user_type' => $this->user->userType,
        ]);

        // Ensure data is array of strings for FCM
        $cleanData = is_array($this->data) ? array_map('strval', $this->data) : [];

        $this->sendNotification($this->user->token, $this->title, $this->body, $cleanData);
        
        Log::info($this->title . ' sent notification');
    }
}

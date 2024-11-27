<?php

namespace App\Providers;

use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;

class BroadcastServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Broadcast::routes(['middleware' => ['jwt_auth']]);

        require base_path('routes/channels.php');  // Ensure this file exists and is required

        Broadcast::channel('private-user.{id}', function ($user, $id) {
            Log::info('Channel authorization attempt:', [
                'user_id' => $user ? $user->id : 'null',
                'channel_id' => $id,
            ]);

            return (int) $user->id === (int) $id;
        });
    }
}

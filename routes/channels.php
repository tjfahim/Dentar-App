<?php

use Illuminate\Support\Facades\Broadcast;
Broadcast::channel('private-user.{id}', function ($user, $id) {
    Log::info('Channel authorization attempt:', [
        'user_id' => $user ? $user->id : 'null',
        'channel_id' => $id,
    ]);

    if ((int) $user->id !== (int) $id) {
        Log::info('Authorization failed', ['user_id' => $user->id, 'channel_id' => $id]);
        return false;
    }

    return (int) $user->id === (int) $id;
});


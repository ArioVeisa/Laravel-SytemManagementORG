<?php

namespace App\Listeners;

use App\Models\ActivityLog;
use Illuminate\Auth\Events\Login;

class LogUserLogin
{
    /**
     * Handle the event.
     */
    public function handle(Login $event): void
    {
        $user = $event->user;
        ActivityLog::log(
            activityType: 'login',
            description: "User {$user->name} ({$user->email}) melakukan login",
            model: $user,
            metadata: [
                'guard' => $event->guard,
            ]
        );
    }
}

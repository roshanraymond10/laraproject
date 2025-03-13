<?php

namespace App\Listeners;

use App\Events\FollowNotification;
use App\Models\Notification;
use Exception;
use Illuminate\Contracts\Queue\ShouldQueue;


class FollowNotificationListener implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     */
    public function handle(FollowNotification $event): void
    {
        info($event->follower);
        info($event->following);
        try {
            $notification = new Notification();
            $notification->senderId = $event->follower;
            $notification->reciverId = $event->following;
            $notification->seen = false;
            $notification->message = 'Follow';
            $notification->save();
        } catch (Exception $e) {
            info($e->getMessage());
        }
    }
}

<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Spatie\Activitylog\Models\Activity;

class CFActivities implements ShouldBroadcast
{

    public $activity;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct()
    {
        $last_activity = Activity::inLog('profile_view')->get()->last();
        $profile = $last_activity->causer;
        $img = $profile->user->name . '.jpg';
        $this->activity = array(
            "time" => $last_activity->created_at->toW3cString(),
            "name" => $profile->firstName,
            "img" => $img,
            "index" => $profile->user->name
        );
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return ['CFSite'];
    }

    public function broadcastAs()
    {
        return 'profile_views';
    }
}

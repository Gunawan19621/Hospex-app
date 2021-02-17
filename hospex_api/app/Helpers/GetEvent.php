<?php
namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Event;

class GetEvent {
    public static function getEvent() {
        $t = Carbon::now();
        $event = Event::join('event_schedules', 'events.id', '=', 'event_schedules.event_id')
                ->whereDate('events.begin',' >= ',$t)
                ->orderBy('events.begin')
                ->first();
        return ( $event ? $event->id : '');
    }
}
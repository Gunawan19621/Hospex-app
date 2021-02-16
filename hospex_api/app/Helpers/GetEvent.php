<?php
namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class GetEvent {
    public static function getEvent() {
        $t = Carbon::now();
        $event =  DB::table('events')
                ->select('events.id')
                ->leftJoin('event_schedules', 'events.id', '=', 'event_schedules.event_id')
                ->whereDate('events.date',' >= ',$t)
                ->orderBy('events.date')
                ->first();
        return ( $event ? $event->id : '');
    }
}
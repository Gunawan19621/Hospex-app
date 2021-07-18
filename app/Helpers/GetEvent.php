<?php
namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Event;

class GetEvent {
    public static function getEvent() {
        $t = Carbon::now();
        $event = Event::whereDate('begin',' <= ',$t)->whereDate('end',' >= ',$t)->orderBy('begin')->first();
        return ( $event ? $event->id : '');
    }
}
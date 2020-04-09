<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventRundown extends Model
{
    protected $table= 'events_rundown';
    protected $fillable= ['task','time','duration','event_schedule_id'];
}

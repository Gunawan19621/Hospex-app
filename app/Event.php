<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['event_title','year','city','event_location','site_plan'];

    public function Schedules()
    {
        return $this->hasMany(EventSchedule::class);
    }
}

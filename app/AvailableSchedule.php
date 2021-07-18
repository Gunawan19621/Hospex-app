<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AvailableSchedule extends Model
{
    protected $fillable = ['event_id','date','time'];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}

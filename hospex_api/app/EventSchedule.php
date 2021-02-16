<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class EventSchedule extends Model
{
    protected $fillable = ['date','event_id'];
    
    public function event()
    {
        return $this->belongsToMany(Event::class);
    }
    public function rundowns()
    {
        return $this->hasMany(EventRundown::class);
    }
}

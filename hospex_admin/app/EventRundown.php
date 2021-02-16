<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventRundown extends Model
{
    protected $fillable = ['task','time','duration','location','event_schedule_id'];

    public function performers()
    {
        return $this->hasMany(Performer::class, 'event_rundown_id', 'id');
    }
}

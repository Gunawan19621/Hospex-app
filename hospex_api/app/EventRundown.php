<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventRundown extends Model
{
    protected $table= 'events_rundown';
    protected $fillable= ['task','time','duration','event_schedule_id'];

    public function performers()
    {
        return $this->hasMany(Performer::class, 'events_rundown_id', 'id');
    }
}

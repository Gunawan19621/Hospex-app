<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MatchRequest extends Model
{
    protected $fillable = [
        'event_exhibitor_id',
        'event_visitor_id',
        'available_schedule_id'
    ];
    
    public function exhibitor()
    {
        return $this->belongsTo(EventExhibitor::class,'event_exhibitor_id','id');
    }
    
    public function visitor()
    {
        return $this->belongsTo(EventVisitor::class,'event_visitor_id','id');
    }

    public function availableSchedule()
    {
        return $this->belongsTo(AvailableSchedule::class);
    }
}

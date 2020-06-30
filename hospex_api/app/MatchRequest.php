<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MatchRequest extends Model
{
    protected $fillable = [
        'date',
        'location',
        'notes',
        'event_exhibitor_id',
        'visitor_id'
    ];
    
    public function exhibitor()
    {
        return $this->belongsTo(EventExhibitor::class,'event_exhibitor_id','id');
    }
    public function visitor()
    {
        return $this->belongsTo(Visitor::class);
    }
    public function getUpdatedAtAttribute()
    {
    return \Carbon\Carbon::parse($this->attributes['created_at'])->format('d, M Y H:i');
      
    }
}

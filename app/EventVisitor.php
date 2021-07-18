<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventVisitor extends Model
{
    protected $fillable = ['event_id', 'company_id'];

    public function company()
    {
        return $this->belongsTo(Company::class,'company_id','id');
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function matches()
    {
        return $this->hasMany(MatchRequest::class,'event_visitor_id','id');
    }
}

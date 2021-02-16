<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventVisitor extends Model
{
    protected $fillable = ['company_id','event_id'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function matches()
    {
        return $this->hasMany(MatchRequest::class);
    }
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}

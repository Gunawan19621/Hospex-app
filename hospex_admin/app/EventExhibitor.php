<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use PHPUnit\Framework\MockObject\Builder\Match;

class EventExhibitor extends Model
{
    protected $fillable = ['event_id', 'company_id','password', 'api_token','reset_token'];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
    public function company()
    {
        return $this->belongsTo(Company::class,'company_id','id');
    }
    public function stands()
    {
        return $this->hasMany(Stand::class);
    }
    public function matches()
    {
        return $this->hasMany(MatchRequest::class,'event_exhibitor_id','id');
    }
    public function user()
    {
        return $this->morphOne(User::class, 'usertable');
    }
    
}

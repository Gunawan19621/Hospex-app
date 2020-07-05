<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $table    = 'event_visitors';
    protected $fillable= ['visitor_name','visitor_email','company_id','password','event_id','company','info','address','phone','api_token'];

    // public function company()
    // {
    //     return $this->belongsTo(Company::class);
    // }
    public function matches()
    {
        return $this->hasMany(MatchRequest::class);
    }
    public function user()
    {
        return $this->morphOne(User::class, 'usertable');
    }
}

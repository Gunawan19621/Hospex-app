<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\EventSponsor;

class EventExhibitor extends Model
{
    protected $fillable = ['event_id', 'company_id'];

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

    public function getSponsorAttribute()
    {
        $sponsor = EventSponsor::where('event_id', $this->event_id)->where('company_id', $this->company_id)->first();

        if($sponsor){
            return true;
        }
        else{
            return false;
        }
    }

    public function getSponsorNameAttribute()
    {
        $sponsor = EventSponsor::where('event_id', $this->event_id)->where('company_id', $this->company_id)->first();

        if($sponsor){
            return $sponsor->sponsor_name;
        }
        else{
            return '';
        }
    }

    protected $appends = ['sponsor','sponsor_name'];
}

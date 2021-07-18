<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventSponsor extends Model
{
    protected $fillable = ['sponsor_name','event_id', 'company_id'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Performer extends Model
{
    protected $fillable = ['name','info','email','phone','events_rundown_id'];

    public function rundown()
    {
        return $this->belongsTo(EventRundown::class);
    }
}

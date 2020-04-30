<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $fillable = ['area_name','event_id'];
    
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
    public function stands()
    {
        return $this->hasMany(Stand::class,'area_id','id');
    }
}

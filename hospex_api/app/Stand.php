<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stand extends Model
{
    protected $fillable = ['stand_name','area_id','event_exhibitor_id'];
    
    public function area()
    {
        return $this->belongsTo(Area::class);
    }
    public function exhibitor()
    {
        return $this->belongsTo(EventExhibitor::class,'event_exhibitor_id','id');
    }
}

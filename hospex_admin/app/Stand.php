<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Area;

class Stand extends Model
{
    protected $fillable = ['stand_name','area_id','event_exhibitor_id'];
    
    public function area()
    {
        return $this->belongsTo(Area::class,'area_id','id');
    }
    
    public function exhibitor()
    {
        return $this->belongsTo(EventExhibitor::class,'event_exhibitor_id','id');
    }

    public function getAreaNameAttribute()
    {
        $area = Area::where('id', $this->area_id)->first();

        if($area){
            return $area->area_name;
        }
        else{
            return '';
        }
    }

    public function getAreaAttribute()
    {
        $area = Area::where('id', $this->area_id)->first();

        if($area){
            return $area;
        }
        else{
            return '';
        }
    }

    protected $appends = ['area_name','area'];
}

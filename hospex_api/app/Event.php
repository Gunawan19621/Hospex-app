<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['event_title','year','city','event_location','site_plan','begin','end','link_buy_event'];

    public function schedules()
    {
        return $this->hasMany(EventSchedule::class);
    }

    public function sponsors()
    { 
        return $this->hasMany(EventSponsor::class);
    }

    public function exhibitors()
    {
        return $this->hasMany(EventExhibitor::class);
    }

    public function areas()
    {
        return $this->hasMany(Area::class);
    }

    public function visitors()
    {
        return $this->hasMany(EventVisitor::class);
    }

    public function availableSchedules()
    {
        return $this->hasMany(AvailableSchedule::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['company_name', 'company_email', 'company_web', 'company_info', 'company_address','logo'];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
    public function sponsors()
    {
        return $this->hasMany(EventSponsor::class);
    }
    public function exhibitors()
    {
        return $this->hasMany(EventExhibitor::class);
    }
    public function visitors()
    {
        return $this->hasMany(Visitor::class);
    }
}

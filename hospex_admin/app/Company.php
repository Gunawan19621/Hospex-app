<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['company_name', 'company_web', 'company_info', 'image'];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_companies', 'company_id', 'category_id');
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
        return $this->hasMany(EventVisitor::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}

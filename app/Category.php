<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['category_name'];
    
    public function companies()
    {
        return $this->belongsToMany(Company::class, 'category_companies', 'category_id', 'company_id');
    }
}

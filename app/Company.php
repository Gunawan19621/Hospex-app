<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['company_name', 'company_email', 'company_web', 'company_address'];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}

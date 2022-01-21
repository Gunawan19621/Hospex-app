<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'company_id', 'name', 'email', 'password', 'type', 'address', 'phone', 'email_verified_at'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}

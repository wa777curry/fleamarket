<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $fillable = [
        'email', 'password'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}

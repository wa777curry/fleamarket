<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = [
        'email', 'password'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}

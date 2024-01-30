<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id', 'username', 'postcode', 'address', 'building', 'icon_url'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

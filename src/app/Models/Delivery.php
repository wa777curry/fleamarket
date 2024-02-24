<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $fillable = [
        'user_id', 'postcode', 'address', 'building'
    ];

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'payment'
    ];

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $fillable = [
        'category_id', 'subcategory'
    ];

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}

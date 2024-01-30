<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'item_id', 'category_id'
    ];

    public function items()
    {
        return $this->belongsToMany(Item::class);
    }
}

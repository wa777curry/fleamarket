<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'seller_id', 'purchaser_id', 'category_id', 'condition_id', 'itemname', 'description', 'price', 'item_url',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'likes', 'item_id', 'user_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
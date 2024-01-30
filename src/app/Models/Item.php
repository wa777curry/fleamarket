<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'purchaser_id', 'seller_id', 'itemname', 'price', 'description', 'item_url', 'condition_id'
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

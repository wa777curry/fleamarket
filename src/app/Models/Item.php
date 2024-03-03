<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'seller_id', 'category_id', 'subcategory_id', 'condition_id',
        'itemname', 'description', 'price', 'item_url',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function views()
    {
        return $this->hasMany(View::class);
    }

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'likes', 'item_id', 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function condition()
    {
        return $this->belongsTo(Condition::class);
    }

    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'admin_id', 'email', 'password'
    ];

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function deliveries()
    {
        return $this->hasMany(Delivery::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function likes()
    {
        return $this->belongsToMany(Item::class, 'likes');
    }

    public function sell_items()
    {
        return $this->hasMany(Item::class, 'seller_id');
    }

    public function purchase_items()
    {
        return $this->belongsToMany(Item::class, 'purchase_items', 'user_id', 'item_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'admin_id', 'email', 'password'
    ];

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function delivery()
    {
        return $this->hasOne(Delivery::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
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

    public function views()
    {
        return $this->hasMany(View::class);
    }
}

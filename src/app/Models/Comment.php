<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'user_id', 'item_id', 'comment'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function userProfile()
    {
        return $this->belongsTo(Profile::class, 'user_id', 'user_id');
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
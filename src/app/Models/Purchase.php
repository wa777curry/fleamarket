<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = [
        'user_id', 'item_id', 'delivery_id', 'payment_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function delivery()
    {
        return $this->belongsTo(Delivery::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}

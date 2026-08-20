<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_code',
        'subtotal',
        'tax',
        'order_amount',
        'order_change',
        'status',
    ];

    public function order_details()
    {
        return $this->hasMany(OrderDetail::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_number','customer_name','customer_email','customer_phone',
        'customer_company','status','payment_method','payment_status',
        'total_amount','notes'
    ];

    protected $casts = [
        'total_amount' => 'decimal:2',
    ];
}

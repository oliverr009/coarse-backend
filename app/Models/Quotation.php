<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    protected $fillable = [
        'quote_number','customer_name','customer_email','customer_phone',
        'company','status','subtotal','tax','total','valid_until','notes'
    ];

    protected $casts = [
        'subtotal' => 'decimal:2',
        'tax' => 'decimal:2',
        'total' => 'decimal:2',
        'valid_until' => 'date',
    ];
}

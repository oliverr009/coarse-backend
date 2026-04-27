<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MpesaLog extends Model
{
    protected $fillable = [
        'checkout_request_id','merchant_request_id','phone','amount','status',
        'result_code','result_description','raw_payload'
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'raw_payload' => 'array',
    ];
}

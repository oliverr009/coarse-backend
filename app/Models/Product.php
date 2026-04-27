<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name','slug','brand','category','sku','processor','ram','storage',
        'screen_size','ports','operating_system','condition','retail_price',
        'wholesale_price','stock','low_stock_threshold','meta_title',
        'meta_description','datasheet_path','manual_path','image_path','is_active'
    ];

    protected $casts = [
        'retail_price' => 'decimal:2',
        'wholesale_price' => 'decimal:2',
        'is_active' => 'boolean',
    ];
}

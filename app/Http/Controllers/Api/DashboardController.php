<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Order;
use App\Models\Quotation;
use App\Models\MpesaLog;

class DashboardController extends Controller
{
    public function index()
    {
        return response()->json([
            'products' => Product::count(),
            'active_products' => Product::where('is_active', true)->count(),
            'low_stock' => Product::whereColumn('stock', '<=', 'low_stock_threshold')->count(),
            'orders' => Order::count(),
            'pending_orders' => Order::where('status', 'pending')->count(),
            'quotations' => Quotation::count(),
            'mpesa_success' => MpesaLog::where('status', 'success')->count(),
            'mpesa_failed' => MpesaLog::whereIn('status', ['cancelled','timeout','insufficient_funds','failed'])->count(),
        ]);
    }
}

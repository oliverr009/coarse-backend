<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        return response()->json(Order::latest()->paginate(20));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'nullable|email',
            'customer_phone' => 'required|string|max:50',
            'customer_company' => 'nullable|string|max:255',
            'payment_method' => 'nullable|string|max:100',
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'nullable|integer',
            'items.*.product_name' => 'required|string|max:255',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.unit_price' => 'required|numeric|min:0',
            'notes' => 'nullable|string',
        ]);

        return DB::transaction(function () use ($data) {
            $total = collect($data['items'])->sum(fn ($item) => $item['quantity'] * $item['unit_price']);

            $order = Order::create([
                'order_number' => 'CO-' . now()->format('Ymd') . '-' . strtoupper(Str::random(5)),
                'customer_name' => $data['customer_name'],
                'customer_email' => $data['customer_email'] ?? null,
                'customer_phone' => $data['customer_phone'],
                'customer_company' => $data['customer_company'] ?? null,
                'status' => 'pending',
                'payment_method' => $data['payment_method'] ?? 'manual',
                'payment_status' => 'pending',
                'total_amount' => $total,
                'notes' => $data['notes'] ?? null,
            ]);

            foreach ($data['items'] as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['product_id'] ?? null,
                    'product_name' => $item['product_name'],
                    'quantity' => $item['quantity'],
                    'unit_price' => $item['unit_price'],
                    'total_price' => $item['quantity'] * $item['unit_price'],
                ]);
            }

            return response()->json($order, 201);
        });
    }

    public function show(Order $order)
    {
        return response()->json($order);
    }

    public function update(Request $request, Order $order)
    {
        $order->update($request->only(['status','payment_status','notes']));

        return response()->json($order);
    }
}

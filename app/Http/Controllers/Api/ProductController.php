<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query()->where('is_active', true);

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        if ($request->filled('brand')) {
            $query->where('brand', $request->brand);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('brand', 'like', "%{$search}%")
                  ->orWhere('processor', 'like', "%{$search}%");
            });
        }

        return response()->json($query->latest()->paginate(20));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'nullable|string|max:100',
            'category' => 'required|string|max:100',
            'sku' => 'nullable|string|max:100',
            'processor' => 'nullable|string|max:100',
            'ram' => 'nullable|string|max:100',
            'storage' => 'nullable|string|max:100',
            'screen_size' => 'nullable|string|max:100',
            'ports' => 'nullable|string|max:255',
            'operating_system' => 'nullable|string|max:100',
            'condition' => 'nullable|string|max:100',
            'retail_price' => 'required|numeric|min:0',
            'wholesale_price' => 'nullable|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'low_stock_threshold' => 'nullable|integer|min:0',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'image_path' => 'nullable|string',
            'datasheet_path' => 'nullable|string',
            'manual_path' => 'nullable|string',
        ]);

        $data['slug'] = Str::slug($data['name']) . '-' . strtolower(Str::random(5));
        $data['is_active'] = true;

        $product = Product::create($data);

        return response()->json($product, 201);
    }

    public function show(Product $product)
    {
        return response()->json($product);
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->all();
        if (isset($data['name']) && empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }
        $product->update($data);

        return response()->json($product);
    }

    public function destroy(Product $product)
    {
        $product->update(['is_active' => false]);

        return response()->json(['message' => 'Product disabled']);
    }

    public function lowStock()
    {
        return response()->json(
            Product::whereColumn('stock', '<=', 'low_stock_threshold')
                ->where('is_active', true)
                ->orderBy('stock')
                ->get()
        );
    }
}

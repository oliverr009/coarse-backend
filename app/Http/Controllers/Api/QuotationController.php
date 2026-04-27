<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Quotation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class QuotationController extends Controller
{
    public function index()
    {
        return response()->json(Quotation::latest()->paginate(20));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'nullable|email',
            'customer_phone' => 'nullable|string|max:50',
            'company' => 'nullable|string|max:255',
            'subtotal' => 'required|numeric|min:0',
            'tax' => 'nullable|numeric|min:0',
            'total' => 'required|numeric|min:0',
            'valid_until' => 'nullable|date',
            'notes' => 'nullable|string',
        ]);

        $data['quote_number'] = 'QT-' . now()->format('Ymd') . '-' . strtoupper(Str::random(5));
        $data['status'] = 'draft';

        return response()->json(Quotation::create($data), 201);
    }

    public function show(Quotation $quotation)
    {
        return response()->json($quotation);
    }

    public function update(Request $request, Quotation $quotation)
    {
        $quotation->update($request->only(['status','notes','valid_until']));
        return response()->json($quotation);
    }
}

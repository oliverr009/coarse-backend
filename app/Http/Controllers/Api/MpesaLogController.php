<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MpesaLog;
use Illuminate\Http\Request;

class MpesaLogController extends Controller
{
    public function index()
    {
        return response()->json(MpesaLog::latest()->paginate(30));
    }

    public function store(Request $request)
    {
        $log = MpesaLog::create([
            'checkout_request_id' => $request->checkout_request_id,
            'merchant_request_id' => $request->merchant_request_id,
            'phone' => $request->phone,
            'amount' => $request->amount,
            'status' => $request->status ?? 'pending',
            'result_code' => $request->result_code,
            'result_description' => $request->result_description,
            'raw_payload' => $request->all(),
        ]);

        return response()->json($log, 201);
    }

    public function show(MpesaLog $mpesaLog)
    {
        return response()->json($mpesaLog);
    }
}

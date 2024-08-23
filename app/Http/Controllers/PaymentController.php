<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    public function createOrder(Request $request)
    {
        // Call the backend API to create a Razorpay order
        $response = Http::post(env('BACKEND_API_URL') . '/create-order', [
            'amount' => $request->amount,
        ]);

        if ($response->successful()) {
            return response()->json($response->json());
        }

        return response()->json(['error' => 'Failed to create order'], 500);
    }
}

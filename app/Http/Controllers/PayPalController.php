<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Http;

class PayPalController extends Controller
{
    public function createOrder(Request $request)
    {
        $totalAmount = $request->amount;

        $response = Http::withBasicAuth(env('PAYPAL_CLIENT_ID'), env('PAYPAL_SECRET'))
            ->post('https://api-m.sandbox.paypal.com/v2/checkout/orders', [
                'intent' => 'CAPTURE',
                'purchase_units' => [
                    [
                        'amount' => [
                            'currency_code' => 'GBP',
                            'value' => $totalAmount
                        ]
                    ]
                ]
            ]);
            // dd($response);
        return response()->json($response->json());
    }

    public function captureOrder(Request $request)
    {
        $orderID = $request->query('token');

        $response = Http::withBasicAuth(env('PAYPAL_CLIENT_ID'), env('PAYPAL_SECRET'))
            ->post("https://api-m.sandbox.paypal.com/v2/checkout/orders/{$orderID}/capture");

        return response()->json($response->json());
    }
}

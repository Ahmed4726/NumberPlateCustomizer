<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

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
                        'reference_id' => 'order-' . uniqid(), // Generate a unique order ID
                        'amount' => [
                            'currency_code' => 'GBP',
                            'value' => $totalAmount,
                        ],
                    ]
                ]
            ]);

        // Check if the response is valid and contains the necessary data
        if ($response->successful()) {
            $paypalOrderData = $response->json();
            return response()->json(['id' => $paypalOrderData['id']]);
        } else {
            // Handle error, log the response, and return an error message
            Log::error("PayPal Order Creation Failed: " . $response->body());
            return response()->json(['error' => 'Unable to create order', 'details' => $response->json()], 400);
        }
    }



    public function captureOrder(Request $request)
    {
        $orderID = $request->query('token');
        $client = new Client();

        try {
            $response = $client->post("https://api-m.sandbox.paypal.com/v2/checkout/orders/{$orderID}/capture", [
                'auth' => [env('PAYPAL_CLIENT_ID'), env('PAYPAL_SECRET')],
                'headers' => [
                    'Content-Type' => 'application/json',
                ]
            ]);

            $responseData = json_decode($response->getBody(), true);

            // 🔍 Find your local order based on PayPal order ID
            // $order = Order::where('paypal_order_id', $orderID)->first();

            // if (!$order) {
            //     return response()->json(['error' => 'Order not found in database.'], 404);
            // }

            // ✅ Return PayPal data + your local order ID
            return response()->json([
                'paypal' => $responseData,
                'order_id' => $orderID
            ]);
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            $errorResponse = $e->getResponse();
            $errorMessage = $errorResponse ? (string) $errorResponse->getBody() : 'Unknown error';

            Log::error("PayPal Order Capture Failed: " . $errorMessage);

            return response()->json([
                'error' => 'Unable to capture order',
                'details' => $errorMessage
            ], 400);
        }
    }



}

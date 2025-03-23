<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PayPalController extends Controller
{
    public function createPayment(Request $request)
    {
        $paypal = new PayPalClient;

        $paypal->setApiCredentials(config('paypal'));
        $paypal->getAccessToken();

        $orderData = [
            "intent" => "CAPTURE",
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "GBP",
                        "value" => $request->amount // Replace with the actual total price
                    ]
                ]
            ],
            "application_context" => [
                "return_url" => route('paypal.success'),
                "cancel_url" => route('paypal.cancel'),
            ]
        ];


        $order = $paypal->createOrder($orderData);

        return response()->json($order);
    }

    public function successPayment(Request $request)
    {
        $paypal = new PayPalClient;
        $paypal->setApiCredentials(config('paypal'));
        $paypal->getAccessToken();

        $response = $paypal->capturePaymentOrder($request->token);

        if ($response['status'] == 'COMPLETED') {
            // Update order status in database
            return redirect()->route('checkout.success')->with('success', 'Payment successful!');
        }

        return redirect()->route('checkout.cancel')->with('error', 'Payment failed.');
    }

    public function cancelPayment()
    {
        return redirect()->route('cart.index')->with('error', 'Payment was cancelled.');
    }
}

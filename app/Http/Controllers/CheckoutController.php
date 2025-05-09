<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{

    public function processCheckout(Request $request)
    {
        $cartItems = json_decode($request->cart_data, true);
        $shippingCost = $request->shipping_cost;

        // Store cart data in session
        session()->put('cart', $cartItems);
        session()->put('shipping', $shippingCost);

        return redirect()->route('checkout'); // Redirect to checkout page
    }

    public function index()
    {
        $cartItems = session()->get('cart', []);
        $shippingCost = session()->get('shipping', 0.00); // Default shipping cost
        $total = collect($cartItems)->sum('price') + $shippingCost;
        $total_cost = collect($cartItems)->sum('price');

        return view('checkout', compact('cartItems', 'total', 'shippingCost','total_cost'));
    }

    public function store(Request $request)
    {
        $cart = session()->get('cart', []);
        $shippingCost = session()->get('shipping', 6.99);
        $totalAmount = collect($cart)->sum('price') + $shippingCost;

        $order = Order::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'address' => $request->address,
            'total_amount' => $totalAmount,
            'payment_status' => 'Paid',
            'order_details' => json_encode($cart),
            'order_status' => 'Pending',
            'shipping_cost' => $shippingCost,
            'order_number' => $request->order_id,
            'remarks' => 'Your Order is Received and we are preparing your order! Thanks for Your Order.'
        ]);

        session()->forget(['cart', 'shipping']); // Clear the cart and shipping info

        // Send Email
        // Mail::to($request->email)->send(new \App\Mail\OrderConfirmation($order));
        // Mail::to(env('ADMIN_EMAIL'))->send(new \App\Mail\NewOrderNotification($order));

        return redirect()->route('index')->with('success', 'Order placed successfully!')->with('order-placed', true);
    }
}


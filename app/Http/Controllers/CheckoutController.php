<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    public function index()
    {
        $cartItems = session()->get('cart', []);
        $total = collect($cartItems)->sum('price');

        return view('checkout', compact('cartItems', 'total'));
    }

    public function store(Request $request)
    {
        $order = Order::create([
            // 'user_id' => auth()->id(),
            'full_name' => $request->full_name,
            'email' => $request->email,
            'address' => $request->address,
            'total_amount' => session()->get('cart_total'),
            'payment_status' => 'Paid',
            'order_details' => json_encode(session()->get('cart')),
        ]);

        session()->forget('cart'); // Clear the cart

        // Send Email to Admin and User
        Mail::to($request->email)->send(new \App\Mail\OrderConfirmation($order));
        Mail::to(env('ADMIN_EMAIL'))->send(new \App\Mail\NewOrderNotification($order));

        return redirect()->route('order.success')->with('success', 'Order placed successfully!');
    }
}

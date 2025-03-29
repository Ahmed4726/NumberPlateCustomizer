<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function trackOrder(Request $request)
    {
        $order = Order::where('order_number', $request->order_number)->first();

        if ($order) {
            return response()->json([
                'success' => true,
                'order_status' => $order->order_status,
                'remarks' => $order->remarks
            ]);
        }

        return response()->json(['success' => false]);
    }

    public function index()
    {
        $orders = Order::orderBy('created_at', 'desc')->paginate(10);
        return view('order', compact('orders'));
    }
}

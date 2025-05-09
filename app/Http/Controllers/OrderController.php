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

    public function index(Request $request)
    {
        $query = Order::query();

        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('full_name', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%')
                  ->orWhere('order_number', 'like', '%' . $request->search . '%');
            });
        }

        $orders = $query->orderByDesc('created_at')->paginate(10);
        return view('order', compact('orders'));
    }

    public function show(Order $order)
    {
        // Decode the order_details JSON
        $orderDetails = json_decode($order->order_details, true);

        return view('orders.show', compact('order', 'orderDetails'));
    }

    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $order->update([
            'order_status' => $request->order_status,
            'remarks' => $request->remarks,
        ]);

        return redirect()->route('order.show', $order->id)->with('success', 'Order status updated successfully');
    }
}

@extends('layouts.dashboard_layout')

@section('content')
<div class="container">
    <h2>Orders</h2>

    <form method="GET" action="{{ route('order') }}" class="mb-4">
        <input type="text" name="search" class="form-control" placeholder="Search by name, email or order number" value="{{ request('search') }}">
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Order Number</th>
                <th>Full Name</th>
                {{-- <th>Email</th> --}}
                <th>Total Amount</th>
                <th>Payment Status</th>
                <th>Order Status</th>
                <th>Created At</th>
                <th>Action</th> <!-- Add this column for the action button -->
            </tr>
        </thead>
        <tbody>
        @forelse($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td><a href="{{ route('order.show', $order->id) }}">{{ $order->order_number }}</a></td> <!-- Link to order details -->
                <td>{{ $order->full_name }}</td>
                {{-- <td>{{ $order->email }}</td> --}}
                <td>{{ number_format($order->total_amount, 2) }}</td>
                <td><span class="badge bg-{{ $order->payment_status == 'Paid' ? 'success' : ($order->payment_status == 'Failed' ? 'danger' : 'warning') }}">
                    {{ $order->payment_status }}</span></td>
                <td>{{ $order->order_status }}</td>
                <td>{{ $order->created_at->format('d M Y') }}</td>
                <td>
                    <a href="{{ route('order.show', $order->id) }}" class="btn btn-primary btn-sm">View</a> <!-- Button for viewing order details -->
                </td>
            </tr>
        @empty
            <tr><td colspan="9" class="text-center">No orders found</td></tr>
        @endforelse
        </tbody>
    </table>

    {{ $orders->withQueryString()->links() }}
</div>
@endsection

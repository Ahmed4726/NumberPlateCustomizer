@extends('layouts.dashboard_layout')

@section('content')
<div class="container">
    <h3>Order Details - {{ $order->order_number }}</h3>

    <ul class="list-group mb-3">
        <li class="list-group-item"><strong>Name:</strong> {{ $order->full_name }}</li>
        <li class="list-group-item"><strong>Email:</strong> {{ $order->email }}</li>
        <li class="list-group-item"><strong>Address:</strong> {{ $order->address }}</li>
        <li class="list-group-item"><strong>Total Amount:</strong> ${{ number_format($order->total_amount, 2) }}</li>
        <li class="list-group-item"><strong>Shipping Cost:</strong> ${{ $order->shipping_cost }}</li>
        <li class="list-group-item"><strong>Payment Status:</strong> {{ $order->payment_status }}</li>
        <li class="list-group-item"><strong>Order Status:</strong> {{ $order->order_status }}</li>
        <li class="list-group-item"><strong>Remarks:</strong> {{ $order->remarks }}</li>
        <li class="list-group-item"><strong>Created At:</strong> {{ $order->created_at }}</li>
    </ul>

    <h4>Order Details</h4>
    <ul class="list-group">
        <li class="list-group-item">
            <strong>Price:</strong> ${{ number_format($orderDetails[0]['price'], 2) }}<br>

            @if($orderDetails[0]['back_plate'])
                <strong>Back Plate:</strong>
                <br>
                <img src="{{ $orderDetails[0]['back_plate'] }}" alt="Back Plate Image" style="max-width: 200px; max-height: 200px;">
            @endif
<br>
            @if($orderDetails[0]['front_plate'])
                <strong>Front Plate:</strong>
                <br>
                <img src="{{ $orderDetails[0]['front_plate'] }}" alt="Front Plate Image" style="max-width: 200px; max-height: 200px;">
            @endif
            <br>
            <strong>Plate Text:</strong> {{ $orderDetails[0]['plate_text'] }}<br>
            <strong>Plate Type:</strong> {{ ucfirst($orderDetails[0]['plate_type']) }}<br>
            <strong>Plate Style:</strong> {{ ucfirst($orderDetails[0]['plate_style']) }}<br>
            <strong>Plate Border:</strong> {{ ucfirst($orderDetails[0]['plate_border']) }}<br>
            <strong>Plate Flag:</strong> {{ ucfirst($orderDetails[0]['plate_flag']) }}
        </li>
    </ul>

    <!-- Button to trigger modal -->
    <button class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#updateStatusModal">Update Order Status</button>
    <a href="{{ route('order') }}" class="btn btn-secondary mt-3">Back to Orders</a>

    <!-- Modal -->
    <div class="modal fade" id="updateStatusModal" tabindex="-1" aria-labelledby="updateStatusModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateStatusModalLabel">Update Order Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('order.updateStatus', $order->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="order_status" class="form-label">Order Status</label>
                            <select name="order_status" id="order_status" class="form-select" required>
                                <option value="Pending" {{ $order->order_status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                <option value="Dispatched" {{ $order->order_status == 'Dispatched' ? 'selected' : '' }}>Dispatched</option>
                                <option value="Ready to Pack" {{ $order->order_status == 'Ready to Pack' ? 'selected' : '' }}>Ready to Pack</option>
                                <option value="Delivered" {{ $order->order_status == 'Delivered' ? 'selected' : '' }}>Delivered</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="remarks" class="form-label">Remarks</label>
                            <textarea name="remarks" id="remarks" class="form-control" rows="3">{{ $order->remarks }}</textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Status</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection

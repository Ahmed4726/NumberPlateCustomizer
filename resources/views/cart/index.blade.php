@extends('layouts.f_layout')

@section('content')
<style>
         .border {
            position: relative;
            border: none;
            outline: 1px solid black;
            outline-offset: -3px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* .border::after {
            content: attr(data-bottom-text);
            position: absolute;
            bottom: 0px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 5px;
            font-family: "Charles Wright";
            color: black;
            background: inherit;
            padding: 2px 6px;
            border-radius: 4px;
        } */

</style>
<div class="container mt-5">
    <h2>Your Cart</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Preview</th>
                <th>Number Plate</th>
                <th>Type</th>
                <th>Border</th>
                <th>Flag</th>
                <th>Style</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0; @endphp
            @foreach ($cartItems as $item)
                @php $total += $item->price; @endphp
                <tr>
                    <td>
                        <img src="{{ $item->rear_image }}" width="100"
                             class="{{ $item->plate_border == 'border' ? 'border' : '' }}">

                        <img src="{{ $item->front_image }}" width="100"
                             class="{{ $item->plate_border == 'border' ? 'border' : '' }}">
                    </td>
                    <td>{{ $item->plate_text }}</td>
                    <td>{{ ucfirst($item->plate_type) }}</td>
                    <td>{{ ucfirst($item->plate_border) }}</td>
                    <td>{{ ucfirst($item->plate_flag) }}</td>
                    <td>{{ ucfirst($item->plate_style) }}</td>
                    <td>£{{ number_format($item->price, 2) }}</td>
                    <td>
                        <form action="{{ route('cart.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Remove</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Display total price -->
    <div class="">
        <h4 class="text-left">Total: <strong>£{{ number_format($total, 2) }}</strong></h4>
    </div>

    <!-- PayPal Button -->
    <div class="text-center">
    <div id="paypal-button-container"  class="mt-3"></div>

</div>
</div>

<!-- PayPal Script -->
<script src="https://www.paypal.com/sdk/js?client-id={{ env('PAYPAL_CLIENT_ID') }}&currency=GBP"></script>
<script>
paypal.Buttons({
    createOrder: function(data, actions) {
        return fetch("{{ route('paypal.create') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({
                amount: {{ $total }} // Pass the total amount to PayPal
            })
        })
        .then(response => response.json())
        .then(order => order.id);
    },
    onApprove: function(data, actions) {
        return fetch("{{ route('paypal.success') }}?token=" + data.orderID)
        .then(response => response.json())
        .then(details => {
            alert("Payment completed successfully!");
            window.location.href = "{{ route('paypal.success') }}";
        });
    },
    onCancel: function(data) {
        window.location.href = "{{ route('paypal.cancel') }}";
    }
}).render('#paypal-button-container');

</script>
@endsection

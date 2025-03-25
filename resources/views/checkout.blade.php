@extends('layouts.f_layout')

@section('content')
<div class="container mt-5">
    <h2>Checkout</h2>

    <form id="checkout-form" method="POST" action="{{ route('checkout.store') }}">
        @csrf

        <div class="mb-3">
            <label for="full_name" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="full_name" name="full_name" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Shipping Address</label>
            <textarea class="form-control" id="address" name="address" required></textarea>
        </div>

        <h4>Total: £{{ number_format($total, 2) }}</h4>

        <input type="hidden" id="order-total" value="{{ $total }}">

        <div class="text-center">
            <div id="paypal-button-container"></div>
        </div>
    </form>
</div>

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
                amount: document.getElementById("order-total").value
            })
        })
        .then(response => response.json())
        .then(order => order.id);
        // alert(response)
    },
    onApprove: function(data, actions) {
        return fetch("{{ route('paypal.success') }}?token=" + data.orderID)
        .then(response => response.json())
        .then(details => {
            document.getElementById('checkout-form').submit(); // Submit the checkout form
        });
    }
}).render('#paypal-button-container');
</script>

@endsection

@extends('layouts.f_layout')

@section('content')
<div class="container mt-5">
    <h2>Checkout</h2>

    <div class="row">
        <div class="col-md-8">
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

                <input type="hidden" id="order-total" value="{{ $total }}">
                <input type="hidden" id="shipping-cost" value="{{ $shippingCost }}">
                <input type="hidden" name="order_id" id="order-id">


                <div class="text-center">
                    <div id="paypal-button-container"></div>
                </div>
            </form>
        </div>

        <!-- Summary Card -->
        <div class="col-md-4">
            <div class="card p-3 shadow">
                <h4 class="mb-3">Order Summary</h4>
                <p><strong>Subtotal:</strong> £<span id="subtotal">{{ number_format($total_cost, 2) }}</span></p>
                <p><strong>Shipping:</strong> £<span id="shipping-cost-display">{{ number_format($shippingCost, 2) }}</span></p>
                <hr>
                <h4><strong>Total: £<span id="total-price">{{ number_format($total, 2) }}</span></strong></h4>
            </div>
        </div>
    </div>
</div>

<script src="https://www.paypal.com/sdk/js?client-id={{ env('PAYPAL_CLIENT_ID') }}&currency=GBP"></script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    paypal.Buttons({
        createOrder: function(data, actions) {
            if (!validateForm()) return;

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
        },
onApprove: function(data, actions) {
    return fetch("{{ route('paypal.success') }}?token=" + data.orderID)
    .then(response => response.json())
    .then(details => {
        Swal.fire({
            title: "Payment Successful!",
            text: "Your order has been placed successfully.",
            icon: "success",
            confirmButtonText: "OK"
        }).then((result) => {
            if (result.isConfirmed) {
                // Clear cart from localStorage
                localStorage.removeItem('cart'); // or localStorage.clear() if you want to remove everything

                document.getElementById('order-id').value = details.order_id;

                document.getElementById('checkout-form').submit();
            }
        });
    })
    .catch(error => {
        Swal.fire({
            title: "Error!",
            text: "Something went wrong with your payment.",
            icon: "error",
            confirmButtonText: "Try Again"
        });
    });
}


    }).render('#paypal-button-container');
});

function validateForm() {
    let fullName = document.getElementById("full_name").value.trim();
    let email = document.getElementById("email").value.trim();
    let address = document.getElementById("address").value.trim();

    if (!fullName || !email || !address) {
        swal.fire("Please fill in all required fields before proceeding.");
        return false;
    }
    return true;
}
</script>

@endsection

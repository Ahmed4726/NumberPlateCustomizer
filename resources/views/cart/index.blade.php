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
        <tbody id="cart-body">
            <!-- Cart items will be inserted here dynamically -->
        </tbody>
    </table>

    <!-- Display total price -->
    <div>
        <h4 class="text-left">Total: <strong>£<span id="total-price">0.00</span></strong></h4>
    </div>

    <a href="{{ route('checkout') }}" class="btn btn-primary">Proceed to Checkout</a>
</div>

<script>
    function loadCart() {
        let cart = JSON.parse(localStorage.getItem("cart")) || [];
        let cartBody = document.getElementById("cart-body");
        let totalPrice = 0;
        cartBody.innerHTML = ""; // Clear the table before inserting items

        cart.forEach((item, index) => {
            let row = `
                <tr>
                    <td>
                        ${item.back_plate ? `<img src="${item.back_plate}" width="100" class="${item.plate_border === 'border' ? 'border' : ''}">` : ''}
                        ${item.front_plate ? `<img src="${item.front_plate}" width="100" class="${item.plate_border === 'border' ? 'border' : ''}">` : ''}
                    </td>
                    <td>${item.plate_text}</td>
                    <td>${item.plate_type.charAt(0).toUpperCase() + item.plate_type.slice(1)}</td>
                    <td>${item.plate_border.charAt(0).toUpperCase() + item.plate_border.slice(1)}</td>
                    <td>${item.plate_flag.charAt(0).toUpperCase() + item.plate_flag.slice(1)}</td>
                    <td>${item.plate_style.charAt(0).toUpperCase() + item.plate_style.slice(1)}</td>
                    <td>£${parseFloat(item.price).toFixed(2)}</td>
                    <td>
                        <button class="btn btn-danger btn-sm" onclick="removeFromCart(${index})">Remove</button>
                    </td>
                </tr>
            `;
            cartBody.innerHTML += row;
            totalPrice += parseFloat(item.price);
        });

        document.getElementById("total-price").innerText = totalPrice.toFixed(2);
    }

    function removeFromCart(index) {
        let cart = JSON.parse(localStorage.getItem("cart")) || [];
        cart.splice(index, 1); // Remove the selected item
        localStorage.setItem("cart", JSON.stringify(cart)); // Update local storage
        loadCart(); // Reload cart items
    }

    document.addEventListener("DOMContentLoaded", loadCart);
</script>

@endsection

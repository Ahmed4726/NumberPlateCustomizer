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

    <!-- Shipping Selection -->
    <div class="mb-3">
        <label for="shipping-method"><strong>Select Shipping:</strong></label>
        <select required id="shipping-method" class="form-control" onchange="updateTotal()">
            <option value="0.00">Choose Shipping Option</option>
            <option value="6.99">Standard Shipping (£6.99)</option>
            <option value="9.99">Express Shipping (£9.99)</option>
        </select>
    </div>

    <!-- Display total price -->
    <div>
        <h4 class="text-left">Total: <strong>£<span id="total-price">0.00</span></strong></h4>
    </div>

    <form id="checkout-form" action="{{ route('checkout.process') }}" method="POST">
        @csrf
        <input type="hidden" name="cart_data" id="cart-data">
        <input type="hidden" name="shipping_cost" id="shipping-cost">
        <button type="submit" class="btn btn-primary">Proceed to Checkout</button>
    </form>
</div>

<script>
    document.getElementById("checkout-form").addEventListener("submit", function (e) {
        let cart = JSON.parse(localStorage.getItem("cart")) || [];
        let shippingCost = document.getElementById("shipping-method") ? parseFloat(document.getElementById("shipping-method").value) : 6.99; // Default to standard shipping

        document.getElementById("cart-data").value = JSON.stringify(cart);
        document.getElementById("shipping-cost").value = shippingCost;
    });
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
                        <button class="btn btn-danger btn-sm" onclick="removeFromCart(${index})">
                            <i class="fas fa-trash"></i>
                        </button>
                        <button class="btn btn-secondary btn-sm" onclick="duplicateCartItem(${index})">
                            <i class="fas fa-copy"></i>
                        </button>
                    </td>
                </tr>
            `;
            cartBody.innerHTML += row;
            totalPrice += parseFloat(item.price);
        });

        document.getElementById("total-price").innerText = totalPrice.toFixed(2);
        updateTotal(); // Update total with shipping cost
    }

    function removeFromCart(index) {
        let cart = JSON.parse(localStorage.getItem("cart")) || [];
        cart.splice(index, 1); // Remove the selected item
        localStorage.setItem("cart", JSON.stringify(cart)); // Update local storage
        loadCart(); // Reload cart items
    }

    function duplicateCartItem(index) {
        let cart = JSON.parse(localStorage.getItem("cart")) || [];
        let duplicatedItem = { ...cart[index] }; // Clone the item
        cart.push(duplicatedItem); // Add duplicate
        localStorage.setItem("cart", JSON.stringify(cart));
        loadCart(); // Refresh UI
    }

    function updateTotal() {
        let cart = JSON.parse(localStorage.getItem("cart")) || [];
        let productTotal = cart.reduce((sum, item) => sum + parseFloat(item.price), 0);
        let shippingCost = parseFloat(document.getElementById("shipping-method").value);
        let total = productTotal + shippingCost;

        document.getElementById("total-price").innerText = total.toFixed(2);
    }

    document.addEventListener("DOMContentLoaded", loadCart);
</script>

<!-- Include FontAwesome for Icons -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

@endsection

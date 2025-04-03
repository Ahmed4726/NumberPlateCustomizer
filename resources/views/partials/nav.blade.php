<!-- Correct Bootstrap 5 CSS link -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<nav class="navbar navbar-expand-lg" style="background-color: rgba(0, 0, 0, 0.05);">
  <div class="container-fluid">
    <a class="navbar-brand" href="/" style="display: inline-block;">
      <img src="images/logos.png" style="width: 150px; position: absolute; top: -45px; margin-left: 30px; z-index: 10;"/>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" href="/">Home</a>
        </li>
        {{-- <li class="nav-item">
          <a class="nav-link" href="#">Gallery</a>
        </li> --}}
        <li class="nav-item">
          <a class="nav-link" href="/contact">Contact Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/about">About Us</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#trackOrderModal">
              Track Your Order
            </a>
          </li>
        <li class="nav-item mx-2 mt-2 position-relative">
            <a href="{{ route('cart.index') }}" class="text-dark">
                <i class="fas fa-shopping-cart"></i>
                <span id="cart-count" class="badge bg-danger position-absolute top-0 start-100 translate-middle">
                    0
                </span>
            </a>
        </li>

      </ul>
    </div>
  </div>
</nav>

<!-- Track Your Order Modal -->
<div class="modal fade" id="trackOrderModal" tabindex="-1" aria-labelledby="trackOrderModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="trackOrderModalLabel">Track Your Order</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="trackOrderForm">
          <div class="mb-3">
            <label for="orderNumber" class="form-label">Enter Order Number</label>
            <input type="text" class="form-control" id="orderNumber" required>
          </div>
          <button type="submit" class="btn btn-primary">Track</button>
        </form>
        <div id="orderDetails" class="mt-3 d-none">
          <p><strong>Status:</strong> <span id="orderStatus"></span></p>
          <p><strong>Remarks:</strong> <span id="orderRemarks"></span></p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Correct Bootstrap 5 JS link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>
    function updateCartCount() {
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        document.getElementById("cart-count").innerText = cart.length;
    }

    // Update count on page load
    document.addEventListener("DOMContentLoaded", updateCartCount);

    // If cart updates dynamically, you can also listen for storage changes
    window.addEventListener("storage", updateCartCount);

    $(document).ready(function () {
      $('#trackOrderForm').submit(function (event) {
        event.preventDefault();
        var orderNumber = $('#orderNumber').val();

        $.ajax({
          url: '{{ route("track.order") }}',
          type: 'GET',
          data: { order_number: orderNumber },
          success: function (response) {
            if (response.success) {
              Swal.fire({
                title: "Order Found!",
                html: `<strong>Status:</strong> ${response.order_status} <br>
                       <strong>Remarks:</strong> ${response.remarks}`,
                icon: "success",
                confirmButtonText: "OK"
              });
            } else {
              Swal.fire({
                title: "Order Not Found!",
                text: "Please check your order number and try again.",
                icon: "error",
                confirmButtonText: "OK"
              });
            }
          },
          error: function () {
            Swal.fire({
              title: "Error!",
              text: "Something went wrong. Please try again later.",
              icon: "error",
              confirmButtonText: "OK"
            });
          }
        });
      });
    });
  </script>


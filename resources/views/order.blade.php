@extends('layouts.dashboard_layout')

@section('content')
<div class="container mt-4">
  <h3>Order Management</h3>

  <!-- Search and Filter Section -->
  <div class="row mb-4">
    <div class="col-md-6">
      <input type="text" id="orderSearch" class="form-control" placeholder="Search by customer name or order ID">
    </div>
    <div class="col-md-3">
      <select id="orderStatusFilter" class="form-control">
        <option value="">Filter by Status</option>
        <option value="pending">Pending</option>
        <option value="completed">Completed</option>
        <option value="canceled">Canceled</option>
      </select>
    </div>
    <div class="col-md-3 text-right">
      <button class="btn btn-primary">Search</button>
    </div>
  </div>

  <!-- Orders Table -->
  <table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>Customer</th>
        <th>Order Date</th>
        <th>Total</th>
        <th>Status</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody id="orderTableBody">
      @foreach($orders as $order)
      <tr>
        <td>{{ $order->id }}</td>
        <td>{{ $order->customer_name }}</td>
        <td>{{ $order->created_at->format('Y-m-d') }}</td>
        <td>${{ number_format($order->total_amount, 2) }}</td>
        <td>
          <span class="badge badge-{{ $order->status == 'pending' ? 'warning' : ($order->payment_status == 'Paid' ? 'success' : 'danger') }}">
            {{ ucfirst($order->payment_status) }}
          </span>
        </td>
        <td>
          <button class="btn btn-info btn-sm view-order" data-order="{{ $order }}">View</button>
          <button class="btn btn-success btn-sm">Complete</button>
          <button class="btn btn-danger btn-sm">Cancel</button>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

  <!-- Pagination -->
  <nav>
    {{ $orders->links() }}
  </nav>
</div>

<!-- Order Details Modal -->
<div class="modal fade" id="orderModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Order Details</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <p><strong>Customer Name:</strong> <span id="modalCustomerName"></span></p>
        <p><strong>Order Date:</strong> <span id="modalOrderDate"></span></p>
        <p><strong>Total Amount:</strong> $<span id="modalOrderTotal"></span></p>
        <p><strong>Status:</strong> <span id="modalOrderStatus"></span></p>
        <h5>Items</h5>
        <div id="orderItems"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".view-order").forEach(button => {
      button.addEventListener("click", function () {
        const order = JSON.parse(this.getAttribute("data-order"));

        document.getElementById("modalCustomerName").textContent = order.full_name;
        document.getElementById("modalOrderDate").textContent = order.created_at;
        document.getElementById("modalOrderTotal").textContent = order.total_amount;
        document.getElementById("modalOrderStatus").textContent = order.order_status;

        let orderItemsHtml = '';
        const orderDetails = JSON.parse(order.order_details);
        orderDetails.forEach(item => {
    if (item.front_plate !== 'null' && item.back_plate !== 'null') {
        orderItemsHtml += `
            <div class="border p-2 mb-2">
                <p><strong>Price:</strong> $${item.price}</p>
                <p><strong>Type:</strong> Both</p>
                <img src="${item.front_plate}" class="img-fluid" style="max-width: 100px;" />
                <img src="${item.back_plate}" class="img-fluid" style="max-width: 100px;" />
            </div>
        `;
    } else if (item.front_plate !== 'null') {
        orderItemsHtml += `
            <div class="border p-2 mb-2">
                <p><strong>Price:</strong> $${item.price}</p>
                <p><strong>Type:</strong> Front</p>
                <img src="${item.front_plate}" class="img-fluid" style="max-width: 100px;" />
            </div>
        `;
    } else if (item.back_plate !== 'null') {
        orderItemsHtml += `
            <div class="border p-2 mb-2">
                <p><strong>Price:</strong> $${item.price}</p>
                <p><strong>Type:</strong> Rear</p>
                <img src="${item.back_plate}" class="img-fluid" style="max-width: 100px;" />
            </div>
        `;
    }
});


        document.getElementById("orderItems").innerHTML = orderItemsHtml;
        $("#orderModal").modal("show");
      });
    });
  });
</script>

@endsection

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
      <!-- Orders will be dynamically loaded here -->
      <tr>
        <td>#12345</td>
        <td>John Doe</td>
        <td>2025-03-10</td>
        <td>$120.00</td>
        <td><span class="badge badge-warning">Pending</span></td>
        <td>
          <button class="btn btn-info btn-sm">View</button>
          <button class="btn btn-success btn-sm">Complete</button>
          <button class="btn btn-danger btn-sm">Cancel</button>
        </td>
      </tr>
      <!-- More rows will go here... -->
    </tbody>
  </table>

  <!-- Pagination -->
  <nav>
    <ul class="pagination justify-content-center">
      <li class="page-item disabled">
        <span class="page-link">Previous</span>
      </li>
      <li class="page-item"><a class="page-link" href="#">1</a></li>
      <li class="page-item"><a class="page-link" href="#">2</a></li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item">
        <a class="page-link" href="#">Next</a>
      </li>
    </ul>
  </nav>
</div>

<script>
  // Get references to the filter inputs
  const searchInput = document.getElementById('orderSearch');
  const statusFilter = document.getElementById('orderStatusFilter');
  const orderTableBody = document.getElementById('orderTableBody');

  // Sample data (this would come from your server in a real scenario)
  const orders = [
    { orderId: '#12345', customer: 'John Doe', date: '2025-03-10', total: 120.00, status: 'pending' },
    { orderId: '#12346', customer: 'Jane Smith', date: '2025-03-11', total: 250.00, status: 'completed' },
    { orderId: '#12347', customer: 'Alice Brown', date: '2025-03-12', total: 75.00, status: 'canceled' },
    // More orders...
  ];

  // Function to render orders in the table
  function renderOrders(filteredOrders) {
    orderTableBody.innerHTML = ''; // Clear existing rows

    filteredOrders.forEach(order => {
      const row = document.createElement('tr');
      row.innerHTML = `
        <td>${order.orderId}</td>
        <td>${order.customer}</td>
        <td>${order.date}</td>
        <td>$${order.total.toFixed(2)}</td>
        <td><span class="badge badge-${order.status === 'pending' ? 'warning' : order.status === 'completed' ? 'success' : 'danger'}">${order.status}</span></td>
        <td>
          <button class="btn btn-info btn-sm">View</button>
          <button class="btn btn-success btn-sm">Complete</button>
          <button class="btn btn-danger btn-sm">Cancel</button>
        </td>
      `;
      orderTableBody.appendChild(row);
    });
  }

  // Function to filter orders
  function filterOrders() {
    const searchText = searchInput.value.toLowerCase();
    const statusText = statusFilter.value.toLowerCase();

    const filteredOrders = orders.filter(order => {
      const matchesSearch = order.customer.toLowerCase().includes(searchText) || order.orderId.toLowerCase().includes(searchText);
      const matchesStatus = statusText ? order.status.toLowerCase() === statusText : true;
      return matchesSearch && matchesStatus;
    });

    renderOrders(filteredOrders);
  }

  // Add event listeners to trigger filter
  searchInput.addEventListener('input', filterOrders);
  statusFilter.addEventListener('change', filterOrders);

  // Initial render
  renderOrders(orders);
</script>

@endsection
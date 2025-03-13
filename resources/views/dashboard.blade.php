@extends('dashboard_layout')
@section('content')
<!-- Inside your header, for example, after the user profile info -->


@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<div class="container">
    <h1>Dashboard</h1>

    <div class="container mt-4">
  <div class="row">
    <!-- Card 1: Total Sales -->
    <div class="col-md-3 mb-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Total Sales</h5>
          <p class="card-text">$50,000</p>
        </div>
        <div class="card-footer text-muted">
          5% increase from last month
        </div>
      </div>
    </div>

    <!-- Card 2: Orders Today -->
    <div class="col-md-3 mb-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Orders Today</h5>
          <p class="card-text">120</p>
        </div>
        <div class="card-footer text-muted">
          15% increase from yesterday
        </div>
      </div>
    </div>

    <!-- Card 3: Total Customers -->
    <div class="col-md-3 mb-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Total Customers</h5>
          <p class="card-text">2,500</p>
        </div>
        <div class="card-footer text-muted">
          3% increase from last month
        </div>
      </div>
    </div>

    <!-- Card 4: Products In Stock -->
    <div class="col-md-3 mb-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Products In Stock</h5>
          <p class="card-text">850</p>
        </div>
        <div class="card-footer text-muted">
          10% decrease from last week
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container mt-4">
  <h4>Recent Activity</h4>
  <ul class="list-group">
    <li class="list-group-item">
      <strong>John Doe</strong> made a purchase of $100. <span class="text-muted">5 minutes ago</span>
    </li>
    <li class="list-group-item">
      <strong>Jane Smith</strong> updated her profile. <span class="text-muted">10 minutes ago</span>
    </li>
    <li class="list-group-item">
      <strong>New Order</strong> from Customer #250. <span class="text-muted">15 minutes ago</span>
    </li>
    <!-- More items... -->
  </ul>
</div>
<div class="container mt-4">
  <h4>Sales Overview</h4>
  <canvas id="salesChart" width="400" height="200"></canvas>
</div>


<div class="container mt-4">
  <h4>User Stats</h4>
  <div class="row">
    <div class="col-md-3">
      <div class="card text-center">
        <div class="card-body">
          <h5 class="card-title">Active Users</h5>
          <p class="card-text">15</p>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card text-center">
        <div class="card-body">
          <h5 class="card-title">New Users Today</h5>
          <p class="card-text">3</p>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card text-center">
        <div class="card-body">
          <h5 class="card-title">Users Registered</h5>
          <p class="card-text">1,500</p>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card text-center">
        <div class="card-body">
          <h5 class="card-title">Active Sessions</h5>
          <p class="card-text">47</p>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container mt-4">
  <h4>Notifications</h4>
  <ul class="list-group">
    <li class="list-group-item">
      <strong>New Order</strong> from John Doe. <span class="text-muted">Just now</span>
    </li>
    <li class="list-group-item">
      <strong>Server Maintenance</strong> scheduled for 2 AM. <span class="text-muted">1 hour ago</span>
    </li>
    <li class="list-group-item">
      <strong>New Product</strong> added to your store. <span class="text-muted">3 hours ago</span>
    </li>
    <!-- More notifications... -->
  </ul>
</div>
<div class="container mt-4">
  <h4>Quick Actions</h4>
  <div class="row">
    <div class="col-md-3 mb-4">
      <a href="/create-product" class="btn btn-info btn-block">Create Product</a>
    </div>
    <div class="col-md-3 mb-4">
      <a href="/orders" class="btn btn-warning btn-block">View Orders</a>
    </div>
    <div class="col-md-3 mb-4">
      <a href="/users" class="btn btn-success btn-block">Manage Users</a>
    </div>
    <div class="col-md-3 mb-4">
      <a href="/settings" class="btn btn-danger btn-block">Settings</a>
    </div>
  </div>
</div>
<div class="container mt-4">
  <h4>Pending Tasks</h4>
  <ul class="list-group">
    <li class="list-group-item d-flex justify-content-between align-items-center">
      Create new marketing campaign
      <span class="badge badge-warning badge-pill">In Progress</span>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center">
      Respond to customer queries
      <span class="badge badge-danger badge-pill">Urgent</span>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center">
      Update product catalog
      <span class="badge badge-success badge-pill">Completed</span>
    </li>
  </ul>
</div>
<div class="container mt-4">
  <h4>System Status</h4>
  <ul class="list-group">
    <li class="list-group-item">
      <strong>Server Status:</strong> <span class="badge badge-success">Online</span>
    </li>
    <li class="list-group-item">
      <strong>Database Connection:</strong> <span class="badge badge-success">Stable</span>
    </li>
    <li class="list-group-item">
      <strong>Backup Status:</strong> <span class="badge badge-warning">In Progress</span>
    </li>
  </ul>
</div>


  
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
// Example of using Chart.js for a sales chart
var ctx = document.getElementById('salesChart').getContext('2d');
var salesChart = new Chart(ctx, {
  type: 'line', // Can be 'line', 'bar', 'pie', etc.
  data: {
    labels: ['January', 'February', 'March', 'April'],
    datasets: [{
      label: 'Sales',
      data: [1200, 1500, 1800, 2000],  // Example data
      borderColor: 'rgba(75, 192, 192, 1)',
      borderWidth: 2,
      fill: false,
    }]
  },
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  }
});
</script>
@endsection


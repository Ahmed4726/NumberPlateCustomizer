@extends('layouts.dashboard_layout')

@section('content')
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

@php
    use App\Models\Order;
    use Carbon\Carbon;


    $totalSales = Order::sum('total_amount');
    // Today's orders
    $totalOrders = Order::count();


    $recentOrders = Order::where('order_status','Pending')->latest()->take(5)->get();

    $pendingOrders = Order::where('order_status','Pending')->count();

    $sales = Order::selectRaw('MONTH(created_at) as month, SUM(total_amount) as total')
    ->groupBy('month')
    ->orderBy('month')
    ->get();

    $labels = $sales->map(fn($s) => date('F', mktime(0, 0, 0, $s->month, 10)));
    $data = $sales->pluck('total');

    $salesData = ['labels' => $labels, 'data' => $data];



@endphp

<div class="container">
    <h1>Dashboard</h1>

    <div class="container mt-4">
        <div class="row">
            {{-- Total Orders --}}
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm bg-primary text-white">
                    <div class="card-body">
                        <h5 class="card-title">Total Orders</h5>
                        <p class="card-text fs-4">{{ $totalOrders }}</p>
                    </div>
                </div>
            </div>

            {{-- Total Sales --}}
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm bg-success text-white">
                    <div class="card-body">
                        <h5 class="card-title">Total Sales</h5>
                        <p class="card-text fs-4">£{{ number_format($totalSales, 2) }}</p>
                    </div>
                </div>
            </div>

            {{-- Pending Orders --}}
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm bg-warning text-dark">
                    <div class="card-body">
                        <h5 class="card-title">Pending Orders</h5>
                        <p class="card-text fs-4">{{ $pendingOrders }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="container mt-4">
        <h4>Recent Orders</h4>
        @if($recentOrders->isEmpty())
            <div class="alert alert-info">No pending orders right now.</div>
        @else
            <ul class="list-group">
                @foreach($recentOrders as $order)
                    <li class="list-group-item">
                        Order #{{ $order->order_number }} - by {{ $order->full_name }} - £{{ number_format($order->total_amount, 2) }}
                        <span class="text-muted">{{ $order->created_at->diffForHumans() }}</span>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>


    <div class="container mt-4">
        <h4>Sales Overview</h4>
        <canvas id="salesChart" width="400" height="200"></canvas>
    </div>

    <div class="container mt-4">
        <h4>Quick Actions</h4>
        <div class="row">
            <div class="col-md-6 mb-4">
                <a href="/products" class="btn btn-info btn-block">Modify Product Price</a>
            </div>
            <div class="col-md-6 mb-4">
                <a href="/order" class="btn btn-warning btn-block">View Orders</a>
            </div>
            {{-- <div class="col-md-3 mb-4">
                <a href="/settings" class="btn btn-danger btn-block">Settings</a>
            </div> --}}
        </div>
    </div>

    <div class="container mt-4">
        <h4>System Status</h4>
        <ul class="list-group">
            <li class="list-group-item">
                <strong>Server Status:</strong> <span class="badge bg-success">Online</span>
            </li>
            <li class="list-group-item">
                <strong>Database Connection:</strong> <span class="badge bg-success">Stable</span>
            </li>
            {{-- <li class="list-group-item">
                <strong>Backup Status:</strong> <span class="badge bg-warning">In Progress</span>
            </li> --}}
        </ul>
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const salesLabels = @json($salesData['labels']);
    const salesValues = @json($salesData['data']);

    const ctx = document.getElementById('salesChart').getContext('2d');
    const salesChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: salesLabels,
            datasets: [{
                label: 'Sales',
                data: salesValues,
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 2,
                fill: false,
                tension: 0.3,
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

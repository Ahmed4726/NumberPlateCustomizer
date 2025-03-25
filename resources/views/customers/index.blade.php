@extends('layouts.dashboard_layout')

@section('content')
    <div class="container">
        <h2>Customers List</h2>

        <!-- Filters -->
        <div class="row mb-3">
            <div class="col-md-3">
                <input type="text" id="filter_name" class="form-control" placeholder="Filter by Name">
            </div>
            <div class="col-md-3">
                <input type="email" id="filter_email" class="form-control" placeholder="Filter by Email">
            </div>
            <div class="col-md-3">
                <input type="text" id="filter_phone" class="form-control" placeholder="Filter by Phone">
            </div>
            <div class="col-md-3">
                <input type="text" id="filter_city" class="form-control" placeholder="Filter by City">
            </div>
        </div>

        <!-- Customers Table -->
        <div id="customer_table">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>City</th>
                        <th>Total Orders</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $customer)
                        <tr>
                            <td>{{ $customer->id }}</td>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->phone_number }}</td>
                            <td>{{ $customer->city }}</td>
                            <td>{{ $customer->total_orders }}</td>
                            <td>{{ $customer->created_at->format('d M Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Pagination Links -->
            <div id="pagination_links">
                {{ $customers->links() }}
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        $(document).ready(function () {
            function fetchCustomers(page = 1) {
                let name = $('#filter_name').val();
                let email = $('#filter_email').val();
                let phone = $('#filter_phone').val();
                let city = $('#filter_city').val();

                $.ajax({
                    url: "{{ route('customers.index') }}?page=" + page,
                    type: "GET",
                    data: {
                        name: name,
                        email: email,
                        phone_number: phone,
                        city: city
                    },
                    success: function (response) {
                        $('#customer_table').html($(response.customers).find('#customer_table').html());
                    }
                });
            }

            // Filter event
            $('#filter_name, #filter_email, #filter_phone, #filter_city').on('keyup', function () {
                fetchCustomers();
            });

            // Pagination click event
            $(document).on('click', '#pagination_links .pagination a', function (event) {
                event.preventDefault();
                let page = $(this).attr('href').split('page=')[1];
                fetchCustomers(page);
            });
        });
    </script>
@endsection



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Order Received</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #c0392b;
            text-align: center;
        }
        .order-details {
            background: #f9f9f9;
            padding: 15px;
            border-radius: 6px;
        }
        table {
            width: 100%;
            margin-top: 10px;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .total {
            font-size: 18px;
            font-weight: bold;
            color: #27ae60;
            text-align: right;
        }
        .footer {
            margin-top: 20px;
            text-align: center;
            color: #888;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <h2>New Order Received</h2>
        <p>Hello Admin,</p>
        <p>A new order has been placed. Here are the details:</p>

        <div class="order-details">
            <table>
                <tr><th>Order ID:</th><td>#{{ $order->id }}</td></tr>
                <tr><th>Order Date:</th><td>{{ $order->created_at->format('d M, Y') }}</td></tr>
                <tr><th>Customer Name:</th><td>{{ $order->full_name }}</td></tr>
                <tr><th>Email:</th><td>{{ $order->email }}</td></tr>
                <tr><th>Shipping Address:</th><td>{{ $order->address }}</td></tr>
            </table>
        </div>

        <h3>Order Summary</h3>
        <table>
            <thead>
                <tr>
                    <th>Number Plate</th>
                    <th>Type</th>
                    <th>Style</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach(json_decode($order->order_details, true) as $item)
                <tr>
                    <td>{{ $item['plate_text'] }}</td>
                    <td>{{ ucfirst($item['plate_type']) }}</td>
                    <td>{{ ucfirst($item['plate_style']) }}</td>
                    <td>£{{ number_format($item['price'], 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <p class="total">Total Amount: £{{ number_format($order->total_amount, 2) }}</p>

        <p>Please process this order as soon as possible.</p>

        <div class="footer">
            <p>&copy; {{ date('Y') }} LA Bonita LTD.</p>
        </div>
    </div>
</body>
</html>

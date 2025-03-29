<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
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
            color: #2c3e50;
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
        <h2>Thank You for Your Order!</h2>
        <p>Hello <strong>{{ $order->full_name }}</strong>,</p>
        <p>Your order has been successfully placed. Below are your order details:</p>

        <div class="order-details">
            <table>
                <tr><th>Order ID:</th><td>#{{ $order->id }}</td></tr>
                <tr><th>Order Date:</th><td>{{ $order->created_at->format('d M, Y') }}</td></tr>
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
        <div class="text-center">
        <p class="total">Total Amount: £{{ number_format($order->total_amount, 2) }}</p>
    </div>
        <p>We will process your order and keep you updated. If you have any questions, feel free to contact us.</p>

        <div class="footer">
            <p>Thank you for choosing us! 🚗💨</p>
            <p>&copy; {{ date('Y') }} LA Bonita</p>
        </div>
    </div>
</body>
</html>

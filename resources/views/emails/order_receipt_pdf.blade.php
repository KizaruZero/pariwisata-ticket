<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trippin' Vocation - Order Receipt & Ticket</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f7f6;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        .header {
            background-color: #3a4a5a;
            color: #fff;
            text-align: center;
            padding: 20px;
        }

        .logo {
            font-size: 28px;
            font-weight: 600;
        }

        .content {
            padding: 30px;
        }

        h1,
        h2 {
            color: #3a4a5a;
            margin-top: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #e0e0e0;
        }

        th {
            background-color: #f8f9fa;
            font-weight: 600;
            color: #3a4a5a;
        }

        .total {
            font-weight: 600;
            font-size: 18px;
            color: #3a4a5a;
        }

        .ticket {
            background-color: #e8f4f8;
            border-top: 2px dashed #3a4a5a;
            padding: 30px;
            position: relative;
        }

        .ticket:before,
        .ticket:after {
            content: '';
            position: absolute;
            top: -10px;
            width: 20px;
            height: 20px;
            background-color: #fff;
            border-radius: 50%;
        }

        .ticket:before {
            left: -10px;
        }

        .ticket:after {
            right: -10px;
        }

        .qr-code {
            text-align: center;
            margin-top: 20px;
        }

        .qr-code img {
            width: 150px;
            height: 150px;
        }

        .footer {
            text-align: center;
            padding: 20px;
            background-color: #3a4a5a;
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="logo">Trippin' Vocation</div>
            <p>Your Adventure Awaits!</p>
        </div>

        <div class="content">
            <h1>Order Receipt</h1>

            <p>Thank you for your order, {{ $order->user->name }}.</p>

            <table>
                <tr>
                    <th>Package</th>
                    <td>{{ $order->packagePricing->package->name }}</td>
                </tr>
                <tr>
                    <th>Destination</th>
                    <td>{{ $order->packagePricing->destination->name }}</td>
                </tr>
                <tr>
                    <th>Payment Method</th>
                    <td>{{ $order->payment_method }}</td>
                </tr>
                <tr class="total">
                    <th>Total Price</th>
                    <td>{{ $order->total_price }}</td>
                </tr>
            </table>

            <p><strong>Order Date:</strong> {{ $order->approved_at }}</p>
        </div>

        <div class="ticket">
            <h2>Your Travel Ticket</h2>
            <table>
                <tr>
                    <th>Passenger Name</th>
                    <td>{{ $order->user->name }}</td>
                </tr>
                <tr>
                    <th>Destination</th>
                    <td>{{ $order->packagePricing->destination->name }}</td>
                </tr>
                <tr>
                    <th>Package</th>
                    <td>{{ $order->packagePricing->package->name }}</td>
                </tr>
                <tr>
                    <th>Date</th>
                    <td>{{ $order->travel_date }}</td>
                </tr>
                <tr>
                    <th>Booking Reference</th>
                    <td>{{ $order->booking_reference }}</td>
                </tr>
            </table>

            <div class="qr-code">
                <img src="/api/placeholder/150/150" alt="QR Code">
                <p>Scan for digital ticket</p>
            </div>
        </div>

        <div class="footer">
            <p>Trippin' Vocation - Making Your Travel Dreams Come True</p>
            <p>If you have any questions, please contact us at support@trippinvocation.com</p>
        </div>
    </div>
</body>

</html>

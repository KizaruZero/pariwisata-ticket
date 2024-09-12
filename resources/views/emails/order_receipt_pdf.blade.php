<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trippin' Vocation - Order Receipt</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .receipt {
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
            color: #4a4a4a;
        }

        h1 {
            color: #2c3e50;
            border-bottom: 2px solid #3498db;
            padding-bottom: 10px;
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
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
            color: #2c3e50;
        }

        .total {
            font-weight: bold;
            font-size: 18px;
            color: #2c3e50;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 14px;
            color: #7f8c8d;
        }
    </style>
</head>

<body>
    <div class="receipt">
        <div class="header">
            <div class="logo">Trippin' Vocation</div>
            <p>Your Adventure Awaits!</p>
        </div>

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

        <div class="footer">
            <p>Trippin' Vocation - Making Your Travel Dreams Come True</p>
            <p>If you have any questions, please contact us at support@trippinvocation.com</p>
        </div>
    </div>
</body>

</html>

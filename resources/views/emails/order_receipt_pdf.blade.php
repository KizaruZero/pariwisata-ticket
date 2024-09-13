<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trippin' Vocation - Your Adventure Awaits</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #e8f5e9;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            box-shadow: 0 10px 30px rgba(46, 204, 113, 0.2);
            border-radius: 16px;
            overflow: hidden;
        }
        .header {
            background: linear-gradient(135deg, #2ecc71, #27ae60);
            color: #fff;
            text-align: center;
            padding: 40px 20px;
            position: relative;
            overflow: hidden;
        }
        .header::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: url('https://cdnjs.cloudflare.com/ajax/libs/simple-icons/3.0.1/simpleicons.svg') repeat;
            opacity: 0.1;
            transform: rotate(30deg);
        }
        .logo {
            font-size: 36px;
            font-weight: 700;
            letter-spacing: 2px;
            margin-bottom: 10px;
        }
        .content {
            padding: 40px;
        }
        h1, h2 {
            color: #2ecc71;
            margin-top: 0;
        }
        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 10px;
            margin-top: 20px;
        }
        th, td {
            padding: 15px;
            text-align: left;
            background-color: #f1f8e9;
            border-radius: 8px;
        }
        th {
            font-weight: 600;
            color: #2ecc71;
            background-color: #e8f5e9;
        }
        .total {
            font-weight: 700;
            font-size: 20px;
            color: #2ecc71;
        }
        .ticket {
            background-color: #f1f8e9;
            border: 2px dashed #2ecc71;
            border-radius: 16px;
            padding: 30px;
            position: relative;
            margin-top: 40px;
        }
        .ticket::before, .ticket::after {
            content: '';
            position: absolute;
            top: -12px;
            width: 24px;
            height: 24px;
            background-color: #e8f5e9;
            border-radius: 50%;
        }
        .ticket::before { left: -12px; }
        .ticket::after { right: -12px; }
        .qr-code {
            text-align: center;
            margin-top: 30px;
        }
        .qr-code img {
            width: 150px;
            height: 150px;
            border: 5px solid #2ecc71;
            border-radius: 10px;
        }
        .footer {
            text-align: center;
            padding: 30px;
            background-color: #2ecc71;
            color: #fff;
        }
        .button {
            display: inline-block;
            padding: 12px 24px;
            background-color: #27ae60;
            color: #fff;
            text-decoration: none;
            border-radius: 30px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .button:hover {
            background-color: #219653;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(46, 204, 113, 0.3);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">Trippin' Vocation</div>
            <p>Your Eco-Adventure Awaits!</p>
        </div>

        <div class="content">
            <h1>🌴 Your Green Getaway Receipt 🌴</h1>

            <p>Thank you for choosing sustainable travel, {{ $order->user->name }}!</p>

            <table>
                <tr>
                    <th>Eco-Package</th>
                    <td>{{ $order->packagePricing->package->name }}</td>
                </tr>
                <tr>
                    <th>Green Destination</th>
                    <td>{{ $order->packagePricing->destination->name }}</td>
                </tr>
                <tr>
                    <th>Earth-Friendly Payment</th>
                    <td>{{ $order->payment_method }}</td>
                </tr>
                <tr class="total">
                    <th>Total Investment in Nature</th>
                    <td>{{ $order->total_price }}</td>
                </tr>
            </table>

            <p><strong>Date of Green Light:</strong> {{ $order->approved_at }}</p>
        </div>

        <div class="ticket">
            <h2>🎫 Your Eco-Travel Pass 🎫</h2>
            <table>
                <tr>
                    <th>Earth Explorer</th>
                    <td>{{ $order->user->name }}</td>
                </tr>
                <tr>
                    <th>Nature's Playground</th>
                    <td>{{ $order->packagePricing->destination->name }}</td>
                </tr>
                <tr>
                    <th>Green Adventure</th>
                    <td>{{ $order->packagePricing->package->name }}</td>
                </tr>
                <tr>
                    <th>Departure to Paradise</th>
                    <td>{{ $order->travel_date }}</td>
                </tr>
                <tr>
                    <th>Eco-Booking Code</th>
                    <td>{{ $order->booking_reference }}</td>
                </tr>
            </table>

            <div class="qr-code">
                <img src="/api/placeholder/150/150" alt="QR Code">
                <p>Scan for your digital eco-pass</p>
            </div>
        </div>

        <div class="footer">
            <h3>Trippin' Vocation - Explore Responsibly, Travel Sustainably</h3>
            <p>Questions about your green adventure? Reach out to our eco-friendly support team:</p>
            <a href="mailto:support@trippinvocation.com" class="button">Contact Eco-Support</a>
        </div>
    </div>
</body>
</html>
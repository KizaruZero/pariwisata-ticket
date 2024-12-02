<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vagabond - Your Adventure Ticket</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-green: #2D9F6B;
            --secondary-green: #4CAF50;
            --light-green: #E8F5E9;
            --accent-green: #81C784;
        }

        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: var(--light-green);
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: white;
            box-shadow: 0 15px 40px rgba(45, 159, 107, 0.15);
            border-radius: 20px;
            overflow: hidden;
        }

        .header {
            background: var(--primary-green);
            color: white;
            text-align: center;
            padding: 40px 20px;
            position: relative;
            clip-path: polygon(0 0, 100% 0, 100% 85%, 0 100%);
        }

        .logo {
            font-size: 40px;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 10px;
        }

        .subtitle {
            font-weight: 300;
            opacity: 0.9;
        }

        .ticket-section {
            padding: 40px;
            background: white;
            position: relative;
        }

        .ticket-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            border-bottom: 2px dashed var(--accent-green);
            padding-bottom: 20px;
        }

        .ticket-details {
            background-color: var(--light-green);
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 20px;
        }

        .detail-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 1px solid rgba(45, 159, 107, 0.1);
        }

        .detail-row:last-child {
            border-bottom: none;
        }

        .detail-label {
            color: var(--primary-green);
            font-weight: 600;
        }

        .detail-value {
            text-align: right;
            font-weight: 500;
        }

        .unique-code-section {
            text-align: center;
            margin-top: 30px;
            padding: 20px;
            background-color: var(--light-green);
            border-radius: 15px;
            font-size: 18px;
            font-weight: 700;
            color: var(--primary-green);
            box-shadow: 0 10px 25px rgba(45, 159, 107, 0.1);
        }

        .footer {
            background: var(--primary-green);
            color: white;
            text-align: center;
            padding: 20px;
            font-size: 14px;
        }

        .adventure-tag {
            position: absolute;
            top: 20px;
            right: 20px;
            background: white;
            color: var(--primary-green);
            padding: 8px 15px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 600;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="logo">VAGABOND</div>
            <p class="subtitle">Your Journey, Your Adventure</p>
            <span class="adventure-tag">Indonesian Expedition</span>
        </div>

        <div class="ticket-section">
            <div class="ticket-header">
                <h2>Adventure Ticket</h2>
                <span>{{ $order->booking_date }}</span>
            </div>

            <div class="ticket-details">
                <div class="detail-row">
                    <span class="detail-label">Traveler Name</span>
                    <span class="detail-value">{{ $order->user->name }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Destination</span>
                    <span class="detail-value">{{ $order->destination->name }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Tickets</span>
                    <span class="detail-value">{{ $order->quantity }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Payment Method</span>
                    <span class="detail-value">{{ $order->payment_method }}</span>
                </div>
            </div>

            <div class="total">
                Total: Rp{{ $order->total_price }}
            </div>

            <div class="unique-code-section">
                Redeem Code:
                <span>
                    {{ strtoupper(substr($order->user->name, 0, 3)) }}-{{ strtoupper(substr($order->destination->name, 0, 3)) }}-{{ date('Ymd', strtotime($order->booking_date)) }}-{{ $order->id }}
                </span>
            </div>
        </div>

        <div class="footer">
            <p>Vagabond Travel - Explore Indonesia's Hidden Treasures</p>
            <p>Support: +62 812 3456 7890 | support@vagabond.travel</p>
        </div>
    </div>
</body>

</html>

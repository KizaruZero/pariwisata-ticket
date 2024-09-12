<!DOCTYPE html>
<html>

<head>
    <title>Your Order Receipt</title>
</head>

<body>
    <p>Dear {{ $order->user->name }},</p>
    <p>Thank you for your order. Please find the receipt attached as a PDF.</p>
</body>

</html>

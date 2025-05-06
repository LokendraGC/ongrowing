<!DOCTYPE html>
<html>

<head>
    <title>Payment Approved</title>
</head>

<body>
    <h2>Hello {{ $payment->user->name }},</h2>
    <p>Your payment of Rs. {{ $payment->amount }} on {{ $payment->pay_date }} has been approved.</p>
    <p>Thank you!</p>
</body>

</html>

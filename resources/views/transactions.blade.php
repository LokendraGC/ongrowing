<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Expenses for {{ $to }}</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 8px;
        }
    </style>
</head>
<body>
    <h2>Expense Report</h2>
    <p>User: <strong>{{ $to }}</strong></p>

    <table width="100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Date</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach($payments as $index => $payment)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $payment->pay_date }}</td>
                    <td>{{ $payment->status == 'paid' ? $payment->amount : $payment->temp_amount }}</td>
                    <td>{{ ucfirst($payment->status) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

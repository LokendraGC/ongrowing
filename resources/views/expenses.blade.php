<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Transactions for {{ $to }}</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 8px;
        }
    </style>
</head>
<body>
    <h2>Transaction Report</h2>
    <p>User: <strong>{{ $to }}</strong></p>

    <table width="100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Date</th>
                <th>Amount</th>
                <th>Detail</th>
            </tr>
        </thead>
        <tbody>
            @foreach($expenses as $index => $expense)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $expense->invest_date }}</td>
                    <td>{{ $expense->expense_amount }}</td>
                    <td>{{ $expense->detail }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> <!-- UTF-8 meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Inline style for PDF -->
    <style>
        @font-face {
            font-family: "NotoNaskhArabic";
            src: url("{{ public_path('fonts/NotoNaskhArabic-Regular.ttf') }}") format("truetype");
        }

        body {
            width: 56mm;
            font-size: 12px;
            margin: 0;
            padding: 5px;
            font-family: "NotoNaskhArabic", sans-serif;
        }

        .receipt-header {
            text-align: center;
        }

        .table {
            width: 100%;
            font-size: 10px;
            border-collapse: collapse;
        }

        .table td, .table th {
            padding: 4px;
            border: 1px solid #000;
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="receipt-header">
        <h4>Pharmacy Name</h4>
        <p>Email: pharmacy@example.com</p>
        <p>Contact: +1234567890</p>
        <hr>
    </div>

    <p><b>Order ID:</b> {{ $order_id }}</p>
    <p><b>Date:</b> {{ \Carbon\Carbon::now()->format('Y-m-d H:i:s') }}</p>
    <hr>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Medicine</th>
                <th>Qty</th>
                <th>Discount</th>
                <th>Total Price</th>
            </tr>
        </thead>
        <tbody>
            @forelse($sales as $index => $sale)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ htmlspecialchars($sale->stock->medicineName, ENT_QUOTES, 'UTF-8') }}</td>
                    <td>{{ $sale->quantity }}</td>
                    <td>{{ number_format($sale->discount, 2) }}</td>
                    <td>{{ number_format($sale->total_price, 2) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No records found</td>
                </tr>
            @endforelse
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3"><b>Total Bill:</b></td>
                <td>{{ number_format($total_bill, 2) }}</td>
            </tr>
        </tfoot>
    </table>

    <hr>
    <p class="text-center">Thank you for your visit!</p>
</body>
</html>

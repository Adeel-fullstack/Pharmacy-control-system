<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Stock Required</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Stock Required</h2>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Current Stock</th>
                <th>Company</th>
                <th>Distributor</th>
            </tr>
        </thead>
        <tbody>
            @foreach($stocks as $stock)
                <tr>
                    <td>{{ ucfirst($stock->medicineName) }}</td>
                    <td>{{ $stock->total_items }}</td>
                    <td>{{ ucfirst($stock->company->name) }}</td>
                    <td>{{ ucfirst($stock->distributor->distributor_name) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

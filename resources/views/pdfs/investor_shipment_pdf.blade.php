<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Template</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 80%;
            max-width: 70%;
            margin: auto;
            padding: 36px;
            margin-top: 20px;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.2);
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .table th,
        .table td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }

        .table th {
            background-color: #f2f2f2;
        }

        .totals {
            display: flex;
            justify-content: space-between;
            padding: 10px;
            border-top: 1px solid #000;
        }
    </style>
</head>

<body>
    <div class="container">
        @php
            $grandTotal = 0.00;
            $grandProft = 0.00;
        @endphp
        @foreach ($shipments as $investor)
        <h2> {{$investor->first_name." ".$investor->last_name }} </h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Amount</th>
                    <th>Container</th>
                    <th>Processing Date</th>
                    <th>Return Date</th>
                    <th>Profit</th>
                    <th>Current Date</th>
                </tr>
            </thead>
            <tbody>
                @if ($investor)
                @php
                    $tableTotal = 0.00;
                    $tableProft = 0.00;
                @endphp
                @forelse ($investor->shipments as $key => $shipment)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $shipment->amount }}</td>
                    <td>{{ $shipment->container_id }}</td>
                    <td>{{ \Carbon\Carbon::parse($shipment->processing_date)->format('Y-m-d') }}</td>
                    <td>{{ \Carbon\Carbon::parse($shipment->return_date)->format('Y-m-d') }}</td>
                    <td>{{ $shipment->profit }}</td>
                    <td>{{ \Carbon\Carbon::parse($shipment->current_date)->format('Y-m-d') }}</td>
                </tr>
                @php
                    $tableTotal += $shipment->amount;
                    $tableProft += $shipment->profit;
                    $grandTotal += $shipment->amount;
                    $grandProft += $shipment->profit;
                @endphp
                @empty
                <tr>
                    <td colspan="9">No shipmet found</td>
                </tr>
                @endforelse
                @else
                <tr>
                    <td colspan="9">Investor not found</td>
                </tr>
                @endif
            <tfoot>
                <tr>
                    <th></th>
                    <th>Total Amount: {{ $tableTotal }}</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>Total Profit: {{ $tableProft }}</th>
                    <th></th>
                </tr>
            </tfoot>
        </table>
        @endforeach

        <div class="totals">
            <span>Grand Total Amount: {{ $grandTotal }}</span>
            <span>Grand Total Profit: {{ $grandProft }} </span>
        </div>

    </div>
</body>

</html>

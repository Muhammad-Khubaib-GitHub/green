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
        .table th, .table td {
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
        <h2>Enter name here</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Amount</th>
                    <th>Processing Date</th>
                    <th>Return Date</th>
                    <th>Profit</th>
                    <th>Current Date</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>2</td>
                    <td>01/07/2024</td>
                    <td>05/08/2024</td>
                    <td>2</td>
                    <td>01/07/2024</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>2</td>
                    <td>01/07/2024</td>
                    <td>05/08/2024</td>
                    <td>2</td>
                    <td>01/07/2024</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>2</td>
                    <td>01/07/2024</td>
                    <td>05/08/2024</td>
                    <td>2</td>
                    <td>01/07/2024</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th></th>
                    <th>Total Amount: 2.00</th>
                    <th></th>
                    <th></th>
                    <th>Total Profit: 2.00</th>
                    <th></th>
                </tr>
            </tfoot>
        </table>

        <h2>Enter name here</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Amount</th>
                    <th>Processing Date</th>
                    <th>Return Date</th>
                    <th>Profit</th>
                    <th>Current Date</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>2</td>
                    <td>01/07/2024</td>
                    <td>05/08/2024</td>
                    <td>2</td>
                    <td>01/07/2024</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>2</td>
                    <td>01/07/2024</td>
                    <td>05/08/2024</td>
                    <td>2</td>
                    <td>01/07/2024</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>2</td>
                    <td>01/07/2024</td>
                    <td>05/08/2024</td>
                    <td>2</td>
                    <td>01/07/2024</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th></th>
                    <th>Total Amount: 2.00</th>
                    <th></th>
                    <th></th>
                    <th>Total Profit: 2.00</th>
                    <th></th>
                </tr>
            </tfoot>
        </table>
        <div class="totals">
            <span>Grand Total Amount: 2.00</span>
            <span>Grand Total Profit: 2.00</span>
        </div>
    </div>
</body>
</html>

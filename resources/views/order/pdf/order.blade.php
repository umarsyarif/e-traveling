<?php
$title = 'Laporan Transaksi';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <style>
        *,
        *:before,
        *:after {
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }

        body {
            font-family: 'Nunito', sans-serif;
            color: #384047;
        }

        table {
            width: 100%;
        }

        caption {
            font-size: 1.6em;
            font-weight: 400;
            padding: 0 0 20px 0;
        }

        thead th {
            font-weight: 300;
            background: #8a97a0;
            color: #FFF;
        }

        tr {
            background: #f4f7f8;
            border-bottom: 1px solid #FFF;
            margin-bottom: 5px;
        }

        tr:nth-child(even) {
            background: #e8eeef;
        }

        th,
        td {
            text-align: left;
            padding: 10px;
        }
    </style>
</head>

<body>
    <div>
        <table>
            <caption>Laporan Order</caption>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Wisata</th>
                    <th>Kustomer</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $order->travel->name }}</td>
                        <td>{{ $order->user->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>

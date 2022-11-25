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
</head>

<body>
    <div>
        <table>
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
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>Wisata</th>
                    <th>Kustomer</th>
                </tr>
            </tfoot>
        </table>
    </div>
</body>

</html>

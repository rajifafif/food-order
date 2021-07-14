<!DOCTYPE html>
<html lang="en">

<head>
        <link rel="stylesheet" href="http://localhost:8080/vendor/adminlte/dist/css/adminlte.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>
<body>
    <h1>Laporan Aktifivas {{ auth()->user()->name }}</h1>
    <p>Total Order : {{ $orders->count() }}</p>
<table class="table table-bordered">
    <tr>
        <th style="width: 35;">#</th>
        <th>Order Number</th>
        <th>Table</th>
        <th>Status</th>
        <th>Total Food</th>
        <th>Total Price</th>
    </tr>
    @foreach ($orders as $order)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $order->order_nbr }}</td>
            <td>{{ $order->table->name ?? '' }}</td>
            <td>{{ ucfirst($order->status) }}</td>
            <td>{{ $order->total_food }}</td>
            <td>{{ \Helper::moneyFormat($order->total_price) }}</td>
        </tr>
    @endforeach
</table>

<p class="text-right">generated at: {{ now() }}</p>
</body>

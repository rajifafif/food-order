@extends('adminlte::page')

@section('title', 'Food')

@section('content_header')
<h1>Order #{{ $order->order_nbr }}</h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-6">
        <table class="table table-bordered">
            <table class="table table-bordered" id="table-food-order">
                <tbody>
                    <tr>
                        <th>#</th>
                        <th>Menu</th>
                        <th>Jumlah</th>
                        <th>Total Price</th>
                    </tr>
                    @foreach ($order->food_orders as $food_order)
                        <tr class="food-item">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $food_order->food->name ?? '' }}</td>
                            <td>{{ $food_order->qty }}</td>
                            <td>{{ $food_order->total_price }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <th colspan="3" class="text-right">Total</th>
                        <th>{{ \Helper::moneyFormat($order->total_price) }}</th>
                    </tr>
                </tbody>
            </table>
        </table>
    </div>
</div>
@stop

@section('css')
{{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
{{-- <script> console.log('Hi!'); </script> --}}
@stop

@extends('adminlte::page')

@section('title', 'Order')

@section('content_header')
    <h1>Order List</h1>
@stop

@section('content')
    <table class="table table-bordered">
        <tr>
            <th style="width: 35;">#</th>
            <th>Order Number</th>
            <th>Table</th>
            <th>Status</th>
            <th>Total Food</th>
            <th>Total Price</th>
            <th style="width: 130px">Action</th>
        </tr>
        @foreach ($orders as $order)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $order->order_nbr }}</td>
                <td>{{ $order->table->name ?? '' }}</td>
                <td>{{ $order->status }}</td>
                <td>{{ $order->status }}</td>
                <td>{{ \Helper::moneyFormat($order->total_price) }}</td>
                <td>
                    <a href="{{ route('orders.edit', $order) }}" class="btn btn-sm btn-warning">Edit</a>
                    {{-- <a href="#" onclick="event.preventDefault();
                    document.getElementById('order-{{$order->id}}-delete').submit();" class="btn btn-sm btn-danger">
                        Delete
                    </a>
                    <form id="order-{{$order->id}}-delete" action="{{ route('orders.destroy', $order) }}" method="POST" style="display: none;" onsubmit="return confirm('Do you really want to submit the form?');">
                        @method('DELETE')
                        @csrf
                    </form> --}}
                </td>
            </tr>
        @endforeach
    </table>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    {{-- <script> console.log('Hi!'); </script> --}}
@stop

@extends('layouts/pwa')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="row">
        @foreach ($tables as $table)
            @if (count($table->orders))
                <div class="col-xs-6 col-md-3">
                    <a href="{{ route('orders.edit', $table->orders->first->id) }}" class="small-box bg-warning">
                        <div class="inner">
                        <h3>{{ $table->name }}<sup style="font-size: 20px">({{ $table->seat }})</sup></h3>
                        </div>
                        <span class="small-box-footer">View Order <i class="fas fa-arrow-plus"></i></span>
                    </a>
                </div>
            @else
            <div class="col-xs-6 col-md-3">
                <a href="{{ route('order-table', $table->id) }}" class="small-box bg-success">
                    <div class="inner">
                    <h3>{{ $table->name }}<sup style="font-size: 20px">({{ $table->seat }})</sup></h3>
                    </div>
                    <span class="small-box-footer">Open Order <i class="fas fa-arrow-plus"></i></span>
                </a>
            </div>
            @endif
        @endforeach
    </div>
@stop

@section('css')

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

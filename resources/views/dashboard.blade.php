@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-6 col-md-3">
            <a href="{{ 'order-table/1' }}" class="small-box bg-success">
                <div class="inner">
                <h3>Meja 1<sup style="font-size: 20px">(4)</sup></h3>
                </div>
                <span class="small-box-footer">Tambah Order <i class="fas fa-arrow-plus"></i></span>
            </a>
        </div>
        <div class="col-xs-6 col-md-3">
            <div class="small-box bg-warning">
                <div class="inner">
                <h3>Meja 1<sup style="font-size: 20px">(4)</sup></h3>
                </div>
                <a href="#" class="small-box-footer">Tambah Menu <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-xs-6 col-md-3">
            <div class="small-box bg-success">
                <div class="inner">
                <h3>Meja 1<sup style="font-size: 20px">(4)</sup></h3>
                </div>
                <a href="#" class="small-box-footer">Order <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

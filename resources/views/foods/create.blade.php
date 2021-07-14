@extends('adminlte::page')

@section('title', 'Food')

@section('content_header')
    <h1>Food List</h1>
    <a href="{{ route('foods.create') }}">Tambah Food</a>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('foods.store') }}" method="post">
                @include('foods._form')
            </form>
        </div>
    </div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    {{-- <script> console.log('Hi!'); </script> --}}
@stop

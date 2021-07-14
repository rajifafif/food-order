@extends('adminlte::page')

@section('title', 'Food')

@section('content_header')
    <h1>Food List</h1>
    <hr>
    <a href="{{ route('foods.create') }}" class="btn btn-primary">Tambah Food</a>
@stop

@section('content')
    <table class="table table-bordered">
        <tr>
            <th style="width: 35;">#</th>
            <th>Name</th>
            <th>Status</th>
            <th>Price</th>
            <th style="width: 130px">Action</th>
        </tr>
        @foreach ($foods as $food)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $food->name }}</td>
                <td>{{ \Helper::deSlug($food->type) }}</td>
                <td>{{ $food->status == 'empty' ? 'Habis' : 'Ready' }}</td>
                <td>{{ \Helper::moneyFormat($food->price) }}</td>
                <td>
                    <a href="{{ route('foods.edit', $food) }}" class="btn btn-sm btn-warning">Edit</a>
                    <a href="#" onclick="event.preventDefault();
                    document.getElementById('food-{{$food->id}}-delete').submit();" class="btn btn-sm btn-danger">
                        Delete
                    </a>
                    <form id="food-{{$food->id}}-delete" action="{{ route('foods.destroy', $food) }}" method="POST" style="display: none;" onsubmit="return confirm('Do you really want to submit the form?');">
                        @method('DELETE')
                        @csrf
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $foods->links() }}
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    {{-- <script> console.log('Hi!'); </script> --}}
@stop

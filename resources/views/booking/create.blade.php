@extends( Auth::check() ? 'layouts/pwa' : 'layouts/custom')

@section('title', 'Booking')

@section('content_header')
    <h1>Booking Meja # {{ $table->id }}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            Detail Meja
        </div>
        <div class="col-md-6">
            Book
        </div>
    </div>
@stop

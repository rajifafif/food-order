@extends( Auth::check() ? 'layouts/pwa' : 'layouts/custom')

@section('title', 'Main')

@section('content_header')
    <h1>Main</h1>
@stop

@section('content')
    <div class="row mb-5">
        <div class="col-md-3">
            <div href="#" class="small-box bg-default">
                <div class="inner">
                    <p>Self Order, Order tanpa tunggu Pelayan Sekarang!</p>
                    <video src="" id="video" class="d-none"></video>
                    <button class="btn btn-block btn-primary" id="scan-meja"><i class="fas fa-qrcode"></i> Scan QR Meja</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach ($tables as $table)
            @if (count($table->orders))
                <div class="col-xs-6 col-md-3">
                    <div href="#" class="small-box bg-default">
                        <div class="inner">
                        <h3>{{ $table->name }}<sup style="font-size: 20px">({{ $table->seat }})</sup></h3>
                        </div>
                        <span class="small-box-footer">Table Sedang Digunakan <i class="fas fa-arrow-plus"></i></span>
                    </div>
                </div>
            @else
            <div class="col-xs-6 col-md-3">
                <div href="#" class="small-box bg-success">
                    <div class="inner">
                    <h3>{{ $table->name }}<sup style="font-size: 20px">({{ $table->seat }})</sup></h3>
                    </div>
                    <span class="small-box-footer">Booking! <i class="fas fa-arrow-plus"></i></span>
                </div>
            </div>
            @endif
        @endforeach
    </div>
@stop

@section('css')
    <style>
        .small-box.bg-default .small-box-footer{
            color: black;
        }
    </style>
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

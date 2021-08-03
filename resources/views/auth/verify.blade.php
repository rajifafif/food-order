@extends('adminlte::auth.verify')
@push('css')
    <meta name="theme-color" content="#000">
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <link rel="apple-touch-icon" href="{{ asset('vendor/adminlte/dist/img/AdminLTELogo.png') }}">
@endpush

@push('js')
    <script src='{{ asset('js/app.js') }}?id=1'></script>
@endpush

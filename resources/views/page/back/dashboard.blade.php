@extends('layout.back.back_main')

@section('page-title', 'Dashboard')

@section('title', 'Dasboard')

@push('head')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>
    <style>
        .card_shadow {
            box-shadow: 3px 3px 5px lightgrey;
        }

        .custom-icon {
            color: white;
            font-size: 18pt;
        }
    </style>
@endpush

@section('content')
    <h2>Selamat Datang, {{ Auth::user()->nama_pengguna }}</h2>

@endsection
@push('js')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script>
        $(document).ready(function () {

        })
    </script>
@endpush

@extends('layouts.main')

@section('container')
    <h1>Halaman Keuangan</h1>
    @foreach ($data as $record)
        <h5>Nama : {{ $record->namaPenjual }} </h5>
        <h5>Gerai : {{ $record->namaGerai }} </h5>
        <h5>Keuntungan : {{ $record->total }} </h5>
    @endforeach
    <form action="/HalamanUtamaKasir" method="GET">
        <button>
            Kembali
        </button>
    </form>
@endsection

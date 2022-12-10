@extends('layouts.main')

@section('container')
    {{-- @unless($menus->isEmpty()) --}}
    <h1>Halaman Utama Kasir</h1>
    {{-- @foreach ($gerai as $ger)
        <h5>
            <a href="/HalamanUtamaPembeli/{{ $ger->idGerai }}">{{ $ger->namaGerai }}</a>
        </h5>
    @endforeach= --}}
    <a href="/Logout">Logout</a>
@endsection

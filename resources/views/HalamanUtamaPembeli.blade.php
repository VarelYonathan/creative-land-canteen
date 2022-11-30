@extends('layouts.main')

@section('container')
    {{-- @unless($menus->isEmpty()) --}}
    <h3>Halaman Utama Pembeli</h3>
    @foreach ($gerai as $ger)
        <h5>
            <a href="/HalamanUtamaPembeli/{{ $ger->idGerai }}">{{ $ger->namaGerai }}</a>
        </h5>
    @endforeach=
@endsection

@extends('layouts.main')

@section('container')
    {{-- @unless($menus->isEmpty()) --}}
    @foreach ($menus as $menu)
        <h5>
            <a href="/daftarMenu/{{ $menu['slug'] }}">{{ $menu['nama'] }}</a>
        </h5>
        {{-- <h5>{{ $menu['nama'] }}</h5> --}}
        <h5>{{ $menu['harga'] }}</h5>
        <h5>{{ $menu['stok'] }}</h5>
        <img src={{ $menu['image'] }} alt={{ $menu['nama'] }}>
    @endforeach=
@endsection

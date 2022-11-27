@extends('layouts.main')

@section('container')
    {{-- @unless($menus->isEmpty()) --}}
    @foreach ($menus as $menu)
        <h5>
            <a href="/daftarMenu/{{ $menu->idMenu }}">{{ $menu->namaMenu }}</a>
        </h5>
        {{-- <h5>{{ $menu['nama'] }}</h5> --}}
        <h5>{{ $menu->hargaMenu }}</h5>
        <h5>{{ $menu->stokMenu }}</h5>
        <img src={{ $menu->image }} alt={{ $menu->namaMenu }}>
    @endforeach=
@endsection

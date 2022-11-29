@extends('layouts.main')

@section('container')
    {{-- @unless($menus->isEmpty()) --}}
    <h3>Daftar Menu</h3>
    @foreach ($menus as $menu)
        <h5>
            <a href="/daftarMenu/{{ $menu->idMenu }}">{{ $menu->namaMenu }}</a>
        </h5>
        {{-- <h5>{{ $menu['nama'] }}</h5> --}}
        <h5>{{ $menu->hargaMenu }}</h5>
        @if ($menu->stokMenu === 1)
            <h5>Tersedia</h5>
        @else
            <h5>Tidak Tersedia</h5>
        @endif
        <img src={{ $menu->image }} alt={{ $menu->namaMenu }}>
    @endforeach=
@endsection

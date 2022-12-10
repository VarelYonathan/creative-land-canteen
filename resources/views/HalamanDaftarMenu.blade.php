@extends('layouts.main')

@section('container')
    {{-- @unless($menus->isEmpty()) --}}
    <h3>Daftar Menu</h3>
    {{-- <form action="/Keranjang" method="POST"> --}}
    <?php
    $i = 0;
    $array = [];
    ?>

    @foreach ($menus as $menu)
        <h5>
            <a href="/Gerai/{{ $menu->idMenu }}">{{ $menu->namaMenu }}</a>
        </h5>
        <h5>{{ $menu->hargaMenu }}</h5>
        <br>
        @if ($menu->stokMenu === 1)
            <h5>Tersedia</h5>
        @else
            <h5>Tidak Tersedia</h5>
        @endif
        <img src="img/{{ $image }}" alt={{ $menu->namaMenu }}>
    @endforeach=
@endsection

@extends('layouts.main')

@section('container')
    <h1>Halaman Utama Penjual</h1>

    <a href="/Penjual/TambahMenu">
        <button>
            Tambah Menu
        </button>
    </a>
    @foreach ($menus as $menu)
        <h5>
            <a href="/Penjual/Menu/{{ $menu->idMenu }}">{{ $menu->namaMenu }}</a>
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
    <a href="/Logout">Logout</a>
@endsection

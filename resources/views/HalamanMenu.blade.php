@extends('layouts.main')

@section('container')
    <h5>
        <a href="/daftarMenu">Kembali</a>
    </h5>
    <h5>{{ $menu->namaMenu }}</h5>
    <h5>{{ $menu->hargaMenu }}</h5>
    @if ($menu->stokMenu === 1)
        <h5>Tersedia</h5>
    @else
        <h5>Tidak Tersedia</h5>
    @endif
    <img src={{ $menu->image }} alt={{ $menu->namaMenu }}>
@endsection

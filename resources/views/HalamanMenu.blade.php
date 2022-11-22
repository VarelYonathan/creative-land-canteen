@extends('layouts.main')

@section('container')
    <h5>
        <a href="/daftarMenu">Kembali</a>
    </h5>
    <h5>{{ $menu['nama'] }}</h5>
    <h5>{{ $menu['harga'] }}</h5>
    <h5>{{ $menu['stok'] }}</h5>
    <img src={{ $menu['image'] }} alt={{ $menu['nama'] }}>
@endsection

@extends('layouts.main')

@section('container')
    @isset($role)
        {{-- <form action="/Penjual/Menu/Edit/{{ $menu->idMenu }}" method="GET"> --}}
        <form action="/Penjual/Menu/Edit/{{ $menu->id }}" method="GET">
            <button>
                Edit
            </button>
        </form>
        <br></br>
        <form action="/Penjual/Menu/Hapus/{{ $menu->id }}" method="POST">
            @csrf
            {{-- <button action="/Penjual/HapusMenu/{{ $menu->idMenu }}" method="POST"> --}}
            <button>
                Hapus Menu
            </button>
        </form>
        <br>
    @else
        <h5>
            <a href="/Gerai">Kembali</a>
        </h5>
    @endisset
    <h5>{{ $menu->namaMenu }}</h5>
    <h5>{{ $menu->hargaMenu }}</h5>
    @if ($menu->stokMenu === 1)
        <h5>Tersedia</h5>
    @else
        <h5>Tidak Tersedia</h5>
    @endif
    {{-- <img src={{ $menu->image }} alt={{ $menu->namaMenu }}> --}}
    <img src="/img/{{ $image }}" alt={{ $menu->namaMenu }}>

    <form action="/HalamanUtamaPenjual" method="GET">
        <button>
            Kembali
        </button>
    </form>
@endsection

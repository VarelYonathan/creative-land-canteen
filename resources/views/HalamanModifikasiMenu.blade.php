@extends('layouts.main')

@section('container')
    <h1>Halaman Edit Menu</h1>
    {{-- <form action="/Penjual/Menu/Edit/{{ $menu->idMenu }}" method="POST"> --}}
    <form action="/Penjual/Menu/Edit/{{ $menu->id }}" method="POST">
        @csrf
        {{-- <h1>{{ $menu->idMenu }}</h1> --}}
        <label for="id">Id Menu:</label>
        {{-- <input type="text" id="idMenu" name="idMenu" value="{{ $menu->idMenu }}" readonly><br><br> --}}
        <input type="text" id="idMenu" name="idMenu" value="{{ $menu->id }}" readonly><br><br>
        <label for="nama">Nama Menu:</label>
        <input type="text" id="namaMenu" name="namaMenu" value="{{ $menu->namaMenu }}" required><br><br>
        <label for="stok">Stok Menu:</label>
        <input type="number" id="stokMenu" name="stokMenu"min=0 max=1 value="{{ $menu->stokMenu }}"> "0 untuk menandakan
        bahwa menu
        tidak tersedia, 1 untuk tersedia"
        <br><br>
        <label for="stok">Harga Menu:</label>
        <input type="number" id="hargaMenu" min=0 name="hargaMenu" value="{{ $menu->hargaMenu }}" required><br><br>
        <label for="stok">Gerai:</label>
        <input type="number" id="gerai" name="gerai" value="{{ $menu->gerai }}" readonly><br><br>
        <input type="submit" value="Edit">
    </form>

    <form action="/Penjual/Menu/{{ $menu->id }}" method="GET">
        <button>
            Kembali
        </button>
    </form>
@endsection

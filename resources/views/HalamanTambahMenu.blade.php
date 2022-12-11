@extends('layouts.main')

@section('container')
    <h3>Halaman Tambah Menu</h3>
    <form action="/Penjual/TambahMenu" method="POST">
        @csrf
        <label for="nama">Nama Menu:</label>
        <input type="text" id="namaMenu" name="namaMenu" required><br><br>
        <label for="stok">Harga:</label>
        <input type="number" id="hargaMenu" name="hargaMenu" min=0 required><br><br>
        <label for="stok"> Gerai:</label>
        <input type="number" id="gerai" name="gerai" value="{{ $gerai }}" readonly><br><br>
        <input type="submit" value="Tambah">
    </form>
@endsection

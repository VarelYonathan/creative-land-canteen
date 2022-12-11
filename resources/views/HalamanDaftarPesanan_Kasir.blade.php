@extends('layouts.main')

@section('container')
    <h1>Halaman Daftar Pesanan</h1>
    <form action="/Kasir/DaftarPesanan/Konfirmasi" method="Post">
        @csrf
        <label for="namaPembeli">Nama:</label>
        <input type="text" id="namaPembeli" name="namaPembeli" placeholder="Nama" value="{{ $namaPembeli }}" readonly>
        <br><br>
        <label for="nomor">Nama:</label>
        <input type="number" id="nomorMeja" name="nomorMeja" placeholder="Nomor Meja" value={{ $nomorMeja }} readonly>
        <br><br>
        <label for="nomor">totalHarga:</label>
        <input type="number" id="totalHarga" name="totalHarga" placeholder="Total Harga"
            value={{ $daftarPesanan->totalHarga }} readonly>
        <br><br>
        <label for="nomor">Status Pembayaran:</label>
        @if ($daftarPesanan->statusPembayaran === 1)
            <input type="text" id="status" name="totalHarga" value="Sudah dibayar" readonly>
            <br>
            <button>Konfirmasi</button>
        @else
            <input type="text" id="status" name="totalHarga" value="Belum dibayar" readonly>
            <br>
            <button disabled>Konfirmasi</button>
        @endif

    </form>
    <form action="/HalamanUtamaKasir" method="GET">
        <button>Kembali</button>
    </form>
@endsection

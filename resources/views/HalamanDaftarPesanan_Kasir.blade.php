@extends('layouts.main')

@section('container')
    <div class="card mx-auto" style="width: 70%;">
        <form action="/Kasir/DaftarPesanan/Konfirmasi/{{ $daftarPesanan->id }}" method="Post">
            @csrf
            <div class="mb-3 row">
                <label for="namaPembeli" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" id="namaPembeli" class="form-control-plaintext" name="namaPembeli"
                        placeholder="Nama" value="{{ $namaPembeli }}" readonly>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="namaPembeli" class="col-sm-2 col-form-label">Nomor Meja:</label>
                <div class="col-sm-10">
                    <input type="number" id="nomorMeja" class="form-control-plaintext" name="nomorMeja"
                        placeholder="Nomor Meja" value={{ $nomorMeja }} readonly>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nomor" class="col-sm-2 col-form-label">totalHarga</label>
                <div class="col-sm-10">
                    <input type="number" id="totalHarga" class="form-control-plaintext" name="totalHarga"
                        placeholder="Total Harga" value={{ $daftarPesanan->totalHarga }} readonly>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="namaPembeli" class="col-sm-2 col-form-label">Nomor Meja:</label>
                @if ($daftarPesanan->statusPembayaran === 1)
                    <div class="col-sm-10">
                        <input type="text" id="status" class="form-control-plaintext" name="totalHarga"
                            value="Sudah dibayar" readonly>
                    </div>
                    <br>
                    <button class="btn btn-primary">Konfirmasi</button>
                @else
                    <div class="col-sm-10">
                        <input type="text" id="status" class="form-control-plaintext" name="totalHarga"
                            value="Belum dibayar" readonly>
                    </div>
                    <br>
                    <button disabled class="btn btn-primary ml-3">Konfirmasi</button>
                @endif

            </div>

        </form>
        <form action="/HalamanUtamaKasir" method="GET">
            <button class="btn btn-primary">Kembali</button>
        </form>
    </div>








    {{-- <form action="/Kasir/DaftarPesanan/Konfirmasi" method="Post">
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
    </form> --}}
@endsection

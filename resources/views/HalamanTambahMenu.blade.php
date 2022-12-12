@extends('layouts.main')

@section('container')
    <div class="card mx-auto" style="width: 90%;">
        <div class="card-header">
            Tambah Menu
        </div>
        <form action="/Penjual/TambahMenu" method="POST">
            @csrf
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama Menu:</label>
                <div class="col-sm-10">
                    <input type="text" id="namaMenu" class="form-control" name="namaMenu" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="stok" class="col-sm-2 col-form-label">Harga</label>
                <div class="col-sm-10">
                    <input type="number" id="hargaMenu" class="form-control" name="hargaMenu" min=0 required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="stok" class="col-sm-2 col-form-label"> Gerai</label>
                <div class="col-sm-10">
                    <input type="number" id="gerai" class="form-control-plaintext" name="gerai"
                        value="{{ $gerai }}" readonly>
                </div>
            </div>
            <input type="submit" class="btn btn-primary mb-3" value="Tambah">

        </form>

        <form action="/HalamanUtamaPenjual" method="GET">
            <button class="btn btn-primary">
                Kembali
            </button>
        </form>
    </div>
@endsection

@extends('layouts.main')

@section('container')
    <div class="card mx-auto" style="width: 90%;">
        <div class="card-header">
            Edit Menu
        </div>
        {{-- <form action="/Penjual/Menu/Edit/{{ $menu->idMenu }}" method="POST"> --}}
        <form action="/Penjual/Menu/Edit/{{ $menu->id }}" method="POST">
            @csrf

            <div class="mb-3 row">
                <label for="id" class="col-sm-2 col-form-label">ID Menu</label>
                <div class="col-sm-10">
                    <input type="text" id="idMenu" class="form-control-plaintext" name="idMenu"
                        value="{{ $menu->id }}" readonly>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="id" class="col-sm-2 col-form-label">Nama Menu</label>
                <div class="col-sm-10">
                    <input type="text" id="namaMenu" class="form-control" name="namaMenu" value="{{ $menu->namaMenu }}">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="stok" class="col-sm-2 col-form-label">Stok Menu</label>
                <div class="col-sm-10">
                    <input type="number" id="stokMenu" class="form-control" name="stokMenu"min=0 max=1
                        value="{{ $menu->stokMenu }}"> "0 untuk
                    menandakan
                    bahwa menu
                    tidak tersedia, 1 untuk tersedia"
                </div>
            </div>

            <div class="mb-3 row">
                <label for="stok" class="col-sm-2 col-form-label">Harga Menu</label>
                <div class="col-sm-10">
                    <input type="number" id="hargaMenu" class="form-control" min=0 name="hargaMenu"
                        value="{{ $menu->hargaMenu }}" required>
                </div>
            </div>

            <div class="mb-3 row">

                <label for="stok" class="col-sm-2 col-form-label">Gerai:</label>
                <div class="col-sm-10">
                    <input type="number" id="gerai" class="form-control-plaintext" name="gerai"
                        value="{{ $menu->gerai }}" readonly>
                </div>
            </div>
            {{-- <label for="nama">Nama Menu:</label>
            <input type="text" id="namaMenu" name="namaMenu" value="{{ $menu->namaMenu }}" required><br><br> --}}
            {{-- <label for="stok">Stok Menu:</label>
            <input type="number" id="stokMenu" name="stokMenu"min=0 max=1 value="{{ $menu->stokMenu }}"> "0 untuk
            menandakan
            bahwa menu
            tidak tersedia, 1 untuk tersedia"
            <br><br> --}}
            {{-- <label for="stok">Harga Menu:</label>
            <input type="number" id="hargaMenu" min=0 name="hargaMenu" value="{{ $menu->hargaMenu }}" required><br><br> --}}
            {{-- <label for="stok">Gerai:</label>
            <input type="number" id="gerai" name="gerai" value="{{ $menu->gerai }}" readonly><br><br> --}}
            <input type="submit" class="btn btn-primary mx-auto mb-3" value="Edit">
        </form>

        <form action="/Penjual/Menu/{{ $menu->id }}" method="GET">
            <button class="btn btn-primary mx-auto">
                Kembali
            </button>
        </form>
    </div>
@endsection

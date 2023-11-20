@extends('layouts.main')

@section('container')
    <div class="card mx-auto" style="width: 90%">

        <div class="mb-3 row">
            <label for="namaPembeli" class="col-sm-2 col-form-label">Nama Menu</label>
            <div class="col-sm-10">
                <input type="text" id="namaMenu" class="form-control-plaintext" name="namaMenu" placeholder="Nama"
                    value="{{ $menu->namaMenu }}" readonly>
            </div>
        </div>

        <div class="mb-3 row">
            <img src="/img/{{ $image }}" class="ml-5" alt={{ $menu->namaMenu }}>
        </div>

        <div class="mb-3 row">
            <label for="namaPembeli" class="col-sm-2 col-form-label">Harga Menu</label>
            <div class="col-sm-10">
                <input type="text" id="hargaMenu" class="form-control-plaintext" name="hargaMenu" placeholder="Nama"
                    value="{{ $menu->hargaMenu }}" readonly>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="namaPembeli" class="col-sm-2 col-form-label">Status</label>
            <div class="col-sm-10">

                @if ($menu->stokMenu === 1)
                    <input type="text" id="namaMenu" class="form-control-plaintext" name="namaMenu" placeholder="Nama"
                        value="{{ 'Menu Tersedia' }}" readonly>
                @else
                    <input type="text" id="namaMenu" class="form-control-plaintext" name="namaMenu" placeholder="Nama"
                        value="{{ 'Menu Tidak Tersedia' }}" readonly>
                @endif
            </div>
        </div>


        {{-- <h5>{{ $menu->namaMenu }}</h5>
        <h5>{{ $menu->hargaMenu }}</h5> --}}
        {{-- @if ($menu->stokMenu === 1)
            <h5>Tersedia</h5>
        @else
            <h5>Tidak Tersedia</h5>
        @endif --}}
        {{-- <img src={{ $menu->image }} alt={{ $menu->namaMenu }}> --}}

        @isset($role)
            <div class="row mx-auto justify-content-md-center">
                <form action="/Penjual/Menu/Edit/{{ $menu->id }}" class="col" method="GET">
                    <button class="btn btn-primary">
                        Edit
                    </button>
                </form>
                <form action="/Penjual/Menu/Hapus/{{ $menu->id }}" class="col" method="POST">
                    @csrf
                    <button class="btn btn-primary">
                        Hapus Menu
                    </button>
                </form>
                <form action="/HalamanUtamaPembeli" class="col" method="GET">
                    <button class="btn btn-primary">
                        Kembali
                    </button>
                </form>
            </div>
        @else
            <form action="/HalamanUtamaPembeli" method="GET">
                <button class="btn btn-primary">
                    Kembali
                </button>
            </form>
        @endisset
    </div>
@endsection

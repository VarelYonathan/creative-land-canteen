@extends('layouts.main')

@section('container')
    {{-- @unless($menus->isEmpty()) --}}
    {{-- <form action="/Keranjang" method="POST"> --}}
    <?php
    $i = 0;
    ?>
    <div class="card mx-auto" style="width: 90%;">
        <form action="/Gerai/Keranjang" method="post">
            @csrf
            @isset($nama)
                <div class="mb-3 row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control-plaintext" id="namaPembeli" name="namaPembeli"
                            placeholder="Nama" value="{{ $nama }}">Nama
                        tidak harus diisi
                    </div>
                </div>
            @else
                <div class="mb-3 row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">

                        <div style="width: 30%;">
                            <input type="text" id="namaPembeli" class="form-control" name="namaPembeli"
                                placeholder="Nama">Nama
                            tidak harus
                            diisi
                        </div>
                    </div>
                </div>
            @endisset
            @isset($nomorMeja)
                <div class="mb-3 row">
                    <label for="nomorMeja" class="col-sm-2 col-form-label">Nomor Meja</label>
                    <div class="col-sm-10">
                        <input type="number" id="nomorMeja" name="nomorMeja" class="form-control" placeholder="Nomor Meja"
                            value={{ $nomorMeja }} required>
                    </div>
                </div>
            @else
                <div class="mb-3 row">
                    <label for="nomorMeja" class="col-sm-2 col-form-label">Nomor Meja</label>
                    <div class="col-sm-10">

                        <div style="width: 30%;">
                            <input type="number" id="nomorMeja" name="nomorMeja" class="form-control" placeholder="Nomor Meja"
                                min=0 required> Harus diisi
                        </div>
                    </div>
                </div>
            @endisset
            @foreach ($menus as $menu)
                <div class="card mx-auto">
                    <h5>
                        {{-- <a href="/Gerai/{{ $menu->idMenu }}">{{ $menu->namaMenu }}</a> --}}
                        <a href="/Gerai/{{ $menu->id }}">{{ $menu->namaMenu }}</a>
                    </h5>
                    @php
                        $idm = "id$i";
                    @endphp

                    <div class="mb-3 row">
                        <label for="idProduk" class="col-sm-2 col-form-label">ID Produk</label>
                        <div class="col-sm-10">
                            <input type="number" id="{{ $idm }}" name="{{ $idm }}"
                                class="form-control-plaintext" value={{ $menu->id }} readonly>

                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="hargaProduk" class="col-sm-2 col-form-label">Harga</label>
                        <div class="col-sm-10">
                            <input type="number" id="harga" name="harga" class="form-control-plaintext"
                                value={{ $menu->hargaMenu }} readonly>
                        </div>
                    </div>
                    {{-- <h5>{{ $menu->hargaMenu }}</h5> --}}
                    @if ($menu->stokMenu === 1)
                        <div class="mb-3 row">
                            <label for="status" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <input type="text" id="status" name="status" class="form-control-plaintext"
                                    value={{ 'Tersedia' }} readonly>
                            </div>
                        </div>
                        {{-- <h5>Tersedia</h5> --}}
                    @else
                        <div class="mb-3 row">
                            <label for="status" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <input type="text" id="status" name="status" class="form-control-plaintext"
                                    value={{ 'Habis' }} readonly>
                            </div>
                        </div>
                        {{-- <h5>Tidak Tersedia</h5> --}}
                    @endif
                    <div class="ml-3">
                        <img src="/img/{{ $image }}" alt={{ $menu->namaMenu }}>
                    </div>
                    @php
                        $id = "jumlahPesanan$i";
                        $i++;
                    @endphp
                    <br>

                    <div class="mb-3 row">
                        <label for="status" class="col-sm-2 col-form-label">Kuantitas</label>
                        <div class="col-sm-10">
                            {{-- <label for="nama">Kuantitas</label> --}}
                            @if ($menu->stokMenu === 1)
                                @isset($value)
                                    <div>
                                        <input type="number" min=0 id="{{ $id }}" name="{{ $id }}"
                                            class="form-control" value={{ $value[$i] }}>
                                    </div>
                                @else
                                    <div style="width: 10%;">
                                        <input type="number" min=0 id="{{ $id }}" name="{{ $id }}"
                                            value=0 class="form-control">
                                    </div>
                                @endisset
                            @else
                                <input type="number" min=0 id="{{ $id }}" name="{{ $id }}" value=0
                                    class="form-control-plaintext" readonly> Tidak
                                dapat
                                memesan
                            @endif
                        </div>
                    </div>

                </div>
            @endforeach
            <div class="mb-3 row">
                <label for="total" class="col-sm-2 col-form-label">Total Menu</label>
                <div class="col-sm-10">
                    <input type=number id="totalMenu" name="totalMenu" class="form-control-plaintext"
                        value={{ $i + 1 }} readonly>
                </div>
            </div>
            <div class="mx-auto">
                <button class="btn btn-primary">
                    Pesan
                </button>
            </div>
        </form>

        <form action="/HalamanUtamaPembeli" class="mt-2 mb-2 mx-auto" method="GET">
            <button class="btn btn-primary">
                Kembali
            </button>
        </form>
    </div>
@endsection

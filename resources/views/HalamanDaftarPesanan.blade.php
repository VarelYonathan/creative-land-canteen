@extends('layouts.main')

@section('container')
    <?php
    $i = 0;
    ?>
    <div class="card mx-auto" style="width: 90%;">
        <form action="/Gerai/Pesan" method="Post">
            @csrf

            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" id="namaPembeli" name="namaPembeli" class="form-control-plaintext"
                        placeholder="Nama" value="{{ $namaPembeli }}" readonly>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nomor" class="col-sm-2 col-form-label">Nomor Meja </label>
                <div class="col-sm-10">
                    <input type="number" id="nomorMeja" name="nomorMeja" class="form-control-plaintext"
                        placeholder="Nomor Meja" value={{ $nomorMeja }} readonly>
                </div>
            </div>
            @foreach ($menus as $menu)
                <div class="card">
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama Menu</label>
                        <div class="col-sm-10">
                            <input type="text" id="namaMenu" name="namaMenu" class="form-control-plaintext"
                                placeholder="Nama" value="{{ $menu->namaMenu }}" readonly>
                        </div>
                    </div>
                    {{-- <h5>
                    {{ $menu->namaMenu }}
                </h5> --}}
                    @php
                        $idm = "id$i";
                    @endphp


                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">ID Produk</label>
                        <div class="col-sm-10">
                            <input type="number" id="{{ $idm }}" name="{{ $idm }}"
                                class="form-control-plaintext" placeholder="Nama" value="{{ $menu->id }}" readonly>
                        </div>
                    </div>
                    {{-- <label for="nama">ID Produk:</label>
                <input type="number" id="{{ $idm }}" name="{{ $idm }}" value={{ $menu->id }}
                    readonly> --}}
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Harga Menu</label>
                        <div class="col-sm-10">
                            <input type="number" id="hargaMenu" name="hargaMenu" class="form-control-plaintext"
                                placeholder="Nama" value="{{ $menu->hargaMenu }}" readonly>
                        </div>
                    </div>
                    {{-- <h5>{{ $menu->hargaMenu }}</h5> --}}
                    <div>
                        <img src="/img/{{ $image }}" alt={{ $menu->namaMenu }}>
                    </div>
                    @php
                        $id = "jumlahPesanan$i";
                        $i++;
                    @endphp
                    <br>

                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Kuantitas</label>
                        <div class="col-sm-10">
                            <input type="number" id="{{ $id }}" name="{{ $id }}"
                                class="form-control-plaintext" value="{{ $kuantitas[$i] }}" readonly>
                        </div>
                    </div>
                    {{-- <label for="nama">Kuantitas:</label>
                <input type="number" id="{{ $id }}" name="{{ $id }}" value={{ $kuantitas[$i] }}
                    readonly> --}}
                </div>
            @endforeach
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Total Jenis Menu Pesanan</label>
                <div class="col-sm-10">
                    <input type="number" id="totalMenu" name="totalMenu" class="form-control-plaintext"
                        value="{{ $i }}" readonly>
                </div>
            </div>
            {{-- <label for="total">Total Menu: </label>
            <input type=number id="totalMenu" name="totalMenu" value={{ $i }} readonly>
            <br> --}}
            @if ($pesan === 1)
                <button class="btn btn-primary">
                    Pesan
                </button>
            @else
                <h5>Belum memesan</h5>
            @endif
        </form>
    </div>
@endsection

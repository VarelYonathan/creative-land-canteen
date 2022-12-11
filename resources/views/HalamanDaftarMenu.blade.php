@extends('layouts.main')

@section('container')
    {{-- @unless($menus->isEmpty()) --}}
    <h3>Daftar Menu</h3>
    {{-- <form action="/Keranjang" method="POST"> --}}
    <?php
    $i = 0;
    ?>
    <form action="/Gerai/Keranjang" method="post">
        @csrf
        @isset($nama)
            <label for="nama">Nama:</label>
            <input type="text" id="namaPembeli" name="namaPembeli" placeholder="Nama" value="{{ $nama }}">Nama
            tidak harus diisi
            <br><br>
        @else
            <label for="nama">Nama:</label>
            <input type="text" id="namaPembeli" name="namaPembeli" placeholder="Nama">Nama tidak harus
            diisi
            <br><br>
        @endisset
        @isset($nomorMeja)
            <label for="nama">Nomor Meja:</label>
            <input type="number" id="nomorMeja" name="nomorMeja" placeholder="Nomor Meja" value={{ $nomorMeja }}
                required><br><br>
        @else
            <label for="nama">Nomor Meja:</label>
            <input type="number" id="nomorMeja" name="nomorMeja" placeholder="Nomor Meja" min=0 required><br><br>
        @endisset
        @foreach ($menus as $menu)
            <h5>
                {{-- <a href="/Gerai/{{ $menu->idMenu }}">{{ $menu->namaMenu }}</a> --}}
                <a href="/Gerai/{{ $menu->id }}">{{ $menu->namaMenu }}</a>
            </h5>
            @php
                $idm = "id$i";
            @endphp
            <label for="nama">ID Produk:</label>
            <input type="number" id="{{ $idm }}" name="{{ $idm }}" value={{ $menu->id }} readonly>
            <h5>{{ $menu->hargaMenu }}</h5>
            @if ($menu->stokMenu === 1)
                <h5>Tersedia</h5>
            @else
                <h5>Tidak Tersedia</h5>
            @endif
            <img src="img/{{ $image }}" alt={{ $menu->namaMenu }}>
            @php
                $id = "jumlahPesanan$i";
                $i++;
            @endphp
            <br>
            <label for="nama">Kuantitas:</label>
            @if ($menu->stokMenu === 1)
                @isset($value)
                    <input type="number" id="{{ $id }}" name="{{ $id }}" value={{ $value[$i] }}>
                @else
                    <input type="number" id="{{ $id }}" name="{{ $id }}" value=0>
                @endisset
            @else
                <input type="number" id="{{ $id }}" name="{{ $id }}" value=0 readonly> Tidak
                dapat
                memesan
            @endif
        @endforeach
        <br>
        <label for="total">Total Menu: </label>
        <input type=number id="totalMenu" name="totalMenu" value={{ $i + 1 }} readonly>
        <br>
        <button>
            Pesan
        </button>
    </form>
@endsection

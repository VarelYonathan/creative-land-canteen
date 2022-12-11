@extends('layouts.main')

@section('container')
    <h1>Keranjang</h1>
    <?php
    $i = 0;
    ?>
    <form action="/Gerai/Pesan" method="Post">
        @csrf
        <label for="namaPembeli">Nama:</label>
        <input type="text" id="namaPembeli" name="namaPembeli" placeholder="Nama" value="{{ $namaPembeli }}" readonly>
        <br><br>
        <label for="nomor">Nama: {{ $nomorMeja }}</label>
        <input type="number" id="nomorMeja" name="nomorMeja" placeholder="Nomor Meja" value={{ $nomorMeja }} readonly>
        @foreach ($menus as $menu)
            <h5>
                {{ $menu->namaMenu }}
            </h5>
            @php
                $idm = "id$i";
            @endphp
            <label for="nama">ID Produk:</label>
            <input type="number" id="{{ $idm }}" name="{{ $idm }}" value={{ $menu->id }} readonly>
            <h5>{{ $menu->hargaMenu }}</h5>
            <img src="img/{{ $image }}" alt={{ $menu->namaMenu }}>
            @php
                $id = "jumlahPesanan$i";
                $i++;
            @endphp
            <br>
            <label for="nama">Kuantitas:</label>
            <input type="number" id="{{ $id }}" name="{{ $id }}" value={{ $kuantitas[$i] }}
                readonly>
        @endforeach
        <label for="total">Total Menu: </label>
        <input type=number id="totalMenu" name="totalMenu" value={{ $i }} readonly>
        <br>
        @if ($pesan === 1)
            <button>
                Pesan
            </button>
        @else
            <h5>Belum memesan</h5>
        @endif
    </form>
@endsection

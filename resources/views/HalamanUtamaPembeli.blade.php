@extends('layouts.main')

@section('container')
    {{-- @unless($menus->isEmpty()) --}}

    @if (session()->has('pesan'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{ session('pesan') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card mx-auto" style="width: 90%;">
        <h3>Halaman Utama Pembeli</h3>


        <div>
            <form action="/Pesanan" method="post">
                @csrf
                <label for="nama" class="col-sm-2 col-form-label">Nama Menu</label>
                <div class="col-sm-10">
                    <input type="number" min=0 id="idDaftarPesanan" name="idDaftarPesanan" class="form-control"
                        placeholder="id pesanan" required>
                    <button class="btn btn-primary">
                        Cek Pesanan
                    </button>
                </div>
            </form>
        </div>

        @foreach ($gerai as $ger)
            <div class="card" style="width: 90%;">
                <h5>
                    @if ($ger->status === 1)
                        {{-- <a href="/HalamanUtamaPembeli/{{ $ger->idGerai }}">{{ $ger->namaGerai }}</a> --}}
                        <a href="/HalamanUtamaPembeli/{{ $ger->id }}">{{ $ger->namaGerai }}</a>
                    @else
                        <a>{{ $ger->namaGerai }}</a>
                    @endif
                </h5>
                <div>
                    <img src="/img/gerai.jpg" class="img-thumbnail img-fluid" alt={{ 'gerai' }}>
                </div>
                <h5>
                    @if ($ger->status === 1)
                        Gerai Buka
                    @else
                        Gerai Tutup
                    @endif
                </h5>
            </div>
        @endforeach
    </div>
@endsection

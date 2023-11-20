@extends('layouts.main')

@section('container')
    <div class="card mx-auto" style="width: 70%;">
        <div class="card-header">
            Daftar Pesanan
        </div>
        <ul class="list-group list-group-flush">
            @foreach ($pesanan as $p)
                <li class="list-group-item">
                    <form action="/Penjual/DaftarPesanan/SelesaikanPesanan/{{ $p->pid }}" method="POST">
                        @csrf
                        <div class="mb-3 row">
                            <label for="id" class="col-sm-2 col-form-label">Id Daftar Pesanan </label>
                            <div class="col-sm-10">
                                <input type="number" id="idDaftarPesanan" class="form-control-plaintext"
                                    name="idDaftarPesanan" value={{ $p->daftarPesanan }} readonly>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="nama" class="col-sm-2 col-form-label">Nama </label>
                            <div class="col-sm-10">
                                <input type="text" id="namaMenu" class="form-control-plaintext" name="namaMenu"
                                    value={{ $p->namaMenu }} readonly>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="jumlah" class="col-sm-2 col-form-label">Jumlah Pesanan </label>
                            <div class="col-sm-10">
                                <input type="text" id="jumlahPesanan" class="form-control-plaintext" name="jumlahPesanan"
                                    value={{ $p->jumlahPesanan }} readonly>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="status" class="col-sm-2 col-form-label">Status Pesanan </label>
                            <div class="col-sm-10">
                                @if ($p->statusPesanan === 1)
                                    <input type="text" id="status" class="form-control-plaintext" name="status"
                                        value={{ 'Selesai' }} readonly>
                                @else
                                    <input type="text" id="status" name="status" value={{ 'Belum' }} readonly>
                                @endif
                            </div>
                        </div>
                        {{-- <h5>
                            : {{ $p->namaMenu }}
                        </h5> --}}
                        {{-- <h5>
                            Jumlah Pesanan : {{ $p->jumlahPesanan }}
                        </h5> --}}
                        {{-- <h5>
                            @if ($p->statusPesanan === 1)
                                Status Pesanan : Selesai
                            @else
                                Status Pesanan : Belum Selesai
                            @endif
                        </h5> --}}
                        {{-- <form action="/Penjual/DaftarPesanan/SelesaikanPesanan/{{ $p->daftarPesanan }}/{{ $p->id }}" method="POST"> --}}

                        @if ($p->statusPesanan === 0)
                            <button class="btn btn-primary mb-3">
                                Selesaikan Pesanan
                            </button>
                        @endif
                    </form>
                </li>
            @endforeach
        </ul>

        <form action="/Penjual/DaftarPesanan/" class="mt-2 mb-2 mx-auto" method="GET">
            <button class="btn btn-primary">
                Kembali
            </button>
        </form>
    </div>
@endsection

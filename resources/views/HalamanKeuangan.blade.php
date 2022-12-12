@extends('layouts.main')

@section('container')
    <div class="card mx-auto" style="width: 70%;">
        <div class="card-header">
            Laporan Keuangan
        </div>
        <ul class="list-group list-group-flush">
            @foreach ($data as $record)
                <li class="list-group-item">
                    {{-- <h5 class="ml-3">
                        <a href="/Kasir/DaftarPesanan/{{ $dp->dfid }}">Daftar Pesanan
                            {{ $dp->dfid }}-{{ $dp->namaPembeli }}-{{ $dp->nomorMeja }}</a>
                    </h5> --}}
                    <h5>Nama : {{ $record->namaPenjual }} </h5>
                    <h5>Gerai : {{ $record->namaGerai }} </h5>
                    <h5>Keuntungan sebelum pajak: {{ $record->total }} </h5>
                    <h5>Keuntungan setelah pajak : {{ $record->total - ($record->total * 5) / 100 }} </h5>
                </li>
            @endforeach
        </ul>

        <form action="/HalamanUtamaKasir" class="mt-2 mb-2 mx-auto" method="GET">
            <button class="btn btn-primary">
                Kembali
            </button>
        </form>
    </div>
@endsection

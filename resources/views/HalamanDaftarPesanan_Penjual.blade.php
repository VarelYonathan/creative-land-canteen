@extends('layouts.main')

@section('container')
    @foreach ($daftarPesanan as $dp)
        <h5>
            <a href="/Penjual/DaftarPesanan/{{ $dp->id }}">Daftar Pesanan
                {{ $dp->id }}-{{ $dp->namaPembeli }}-{{ $dp->nomorMeja }}</a>
        </h5>
    @endforeach

    <form action="/HalamanUtamaPenjual" method="GET">
        <button>
            Kembali
        </button>
    </form>
@endsection

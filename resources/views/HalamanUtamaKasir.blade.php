@extends('layouts.main')

@section('container')
    @foreach ($daftarPesanan as $dp)
        <h5>
            <a href="/Kasir/DaftarPesanan/{{ $dp->id }}">Daftar Pesanan
                {{ $dp->id }}-{{ $dp->namaPembeli }}-{{ $dp->nomorMeja }}</a>
        </h5>
    @endforeach
    <br>
    <form action="/Kasir/Keuangan">
        <button>
            Keuangan
        </button>
    </form>
@endsection

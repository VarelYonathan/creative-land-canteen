@extends('layouts.main')

@section('container')
    <h1>Halaman Pembayaran</h1>
    <p>Selesaikan pembayaran ke kasir</p>
    <form action="/Gerai/Pembayaran/{{ $daftarPesanan }}" method="POST">
        <button>
            Bayar
        </button>
    </form>
@endsection

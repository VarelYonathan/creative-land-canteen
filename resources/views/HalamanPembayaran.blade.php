@extends('layouts.main')

@section('container')
    <div class="card mx-auto mt-5" style="width: 70%;">
        <p>Berhasil memesan! ID pesanan anda adalah {{ $daftarPesanan }}</p>
        <p>Selesaikan pembayaran ke kasir</p>
        <form action="/Gerai/Pembayaran/Bayar/{{ $daftarPesanan }}" method="POST">
            @csrf
            <div class="mx-auto">
                <button class="btn btn-primary mx-auto">
                    Bayar
                </button>
            </div>
        </form>
    </div>
@endsection

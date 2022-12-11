@extends('layouts.main')

@section('container')
    @foreach ($pesanan as $p)
        <form action="/Penjual/DaftarPesanan/SelesaikanPesanan/{{ $p->pid }}" method="POST">
            @csrf
            <label for="id">Id Daftar Pesanan : </label>
            <input type="number" id="idDaftarPesanan" name="idDaftarPesanan" value={{ $p->daftarPesanan }} readonly>
            <h5>
                Nama : {{ $p->namaMenu }}
            </h5>
            <h5>
                Jumlah Pesanan : {{ $p->jumlahPesanan }}
            </h5>
            <h5>
                @if ($p->statusPesanan === 1)
                    Status Pesanan : Selesai
                @else
                    Status Pesanan : Belum Selesai
                @endif
            </h5>
            {{-- <form action="/Penjual/DaftarPesanan/SelesaikanPesanan/{{ $p->daftarPesanan }}/{{ $p->id }}" method="POST"> --}}

            @if ($p->statusPesanan === 0)
                <button>
                    Selesaikan Pesanan
                </button>
            @endif
        </form>
    @endforeach

    <form action="/Penjual/DaftarPesanan/" method="GET">
        <button>
            Kembali
        </button>
    </form>
@endsection

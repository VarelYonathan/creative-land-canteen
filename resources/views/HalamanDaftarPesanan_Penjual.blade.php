@extends('layouts.main')

@section('container')
    <div class="card mx-auto" style="width: 70%;">
        <div class="card-header">
            Daftar Pesanan
        </div>
        <ul class="list-group list-group-flush">
            @foreach ($daftarPesanan as $dp)
                <li class="list-group-item">
                    <h5 class="ml-3">
                        <a href="/Penjual/DaftarPesanan/{{ $dp->dfid }}">Daftar Pesanan
                            {{ $dp->dfid }}-{{ $dp->namaPembeli }}-{{ $dp->nomorMeja }}</a>
                    </h5>
                </li>
            @endforeach
        </ul>

        <form action="/HalamanUtamaPenjual" class="mt-2 mb-2 mx-auto" method="GET">
            <button class="btn btn-primary">
                Kembali
            </button>
        </form>
    </div>
@endsection

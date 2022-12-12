@extends('layouts.main')

@section('container')
    @if (session()->has('editError'))
        <div class="alert-danger alert-dismissible fade show" role="alert">
            {{ session('editError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="card mx-auto" style="width: 90%;">
        <div class="card-header">
            Daftar Menu
        </div>
        <div class="row mx-auto justify-content-md-center">
            <form action="/Penjual/DaftarPesanan" class="col" method="GET">
                <button class="btn btn-primary">
                    Daftar Pesanan
                </button>
            </form>
            <form action="/Penjual/TambahMenu"class="col" method="GET">
                <button class="btn btn-primary">
                    Tambah Menu
                </button>
            </form>
        </div>
        <ul class="list-group list-group-flush">
            @if ($kosong === 1)
                <h4 class="mx-auto">Gerai Kosong</h4>
            @endif
            @foreach ($menus as $menu)
                <li class="list-group-item">
                    <h5 class="ml-3">
                        <a href="/Penjual/Menu/{{ $menu->id }}">{{ $menu->namaMenu }}</a>
                    </h5>
                    <img src="img/{{ $image }}" class="ml-3" alt={{ $menu->namaMenu }}>
                    <h5 class="ml-3">{{ 'Rp.' . $menu->hargaMenu }}</h5>
                    @if ($menu->stokMenu === 1)
                        <h5 class="ml-3">Menu Tersedia</h5>
                    @else
                        <h5 class="ml-3">Menu Tidak Tersedia</h5>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
@endsection

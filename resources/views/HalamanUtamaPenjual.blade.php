@extends('layouts.main')

@section('container')
    @if (session()->has('editError'))
        <div class="alert-danger alert-dismissible fade show" role="alert">
            {{ session('editError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <form action="/Penjual/DaftarPesanan" method="GET">
        <button>
            Daftar Pesanan
        </button>
    </form>

    <a href="/Penjual/TambahMenu">
        <button>
            Tambah Menu
        </button>
    </a>

    {{-- <h4>{{ $kosong }}</h4> --}}
    @if ($kosong === 1)
        <h4>Gerai Kosong</h4>
    @endif
    @foreach ($menus as $menu)
        <h5>
            {{-- <a href="/Penjual/Menu/{{ $menu->idMenu }}">{{ $menu->namaMenu }}</a> --}}
            <a href="/Penjual/Menu/{{ $menu->id }}">{{ $menu->namaMenu }}</a>
        </h5>
        <h5>{{ $menu->hargaMenu }}</h5>
        <br>
        @if ($menu->stokMenu === 1)
            <h5>Tersedia</h5>
        @else
            <h5>Tidak Tersedia</h5>
        @endif
        <img src="img/{{ $image }}" alt={{ $menu->namaMenu }}>
    @endforeach
@endsection

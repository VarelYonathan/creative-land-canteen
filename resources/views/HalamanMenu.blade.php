@extends('layouts.main')

@section('container')
    @isset($role)
        <form action="/Penjual/Menu/Edit/{{ $menu->idMenu }}" method="GET">
            <button>
                Edit
            </button>
        </form>
        <form>
            <button action="/Penjual/HapusMenu/{{ $menu->idMenu }}" method="POST">
                Hapus Menu
            </button>
        </form>
        <br>
    @else
        <h5>
            <a href="/Gerai">Kembali</a>
        </h5>
    @endisset
    <h5>{{ $menu->namaMenu }}</h5>
    <h5>{{ $menu->hargaMenu }}</h5>
    @if ($menu->stokMenu === 1)
        <h5>Tersedia</h5>
    @else
        <h5>Tidak Tersedia</h5>
    @endif
    {{-- <img src={{ $menu->image }} alt={{ $menu->namaMenu }}> --}}
    <img src="img/{{ $image }}" alt={{ $menu->namaMenu }}>
@endsection

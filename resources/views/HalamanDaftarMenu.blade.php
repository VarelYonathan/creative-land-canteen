@extends('layouts.main')

@section('container')
    {{-- @unless($menus->isEmpty()) --}}
    <h3>Daftar Menu</h3>
    {{-- <form action="/Keranjang" method="POST"> --}}
    <?php
    $i = 0;
    $array = [];
    ?>
    @foreach ($menus as $menu)
        <?php
        $n = $i;
        $count = 0;
        $i++;
        $array[] = $count;
        ?>
        <h5>
            <a href="/Gerai/{{ $menu->idMenu }}">{{ $menu->namaMenu }}</a>
        </h5>
        {{-- <h5>{{ $menu['nama'] }}</h5> --}}
        <h5>{{ $menu->hargaMenu }}</h5>
        <br>
        <h5><?php echo $count; ?></h5>
        @if ($menu->stokMenu === 1)
            <h5>Tersedia</h5>
        @else
            <h5>Tidak Tersedia</h5>
        @endif
        <div>
            <label>Quantity</label>
            <div>
                <span class="input-group-text decrement-btn">-</span>
                <input type="text" value="1">
                <span class="input-group-text increment-btn">+</span>
            </div>
        </div>
        <button onclick="<?php $count++; ?>">+</button>
        <button onclick="<?php $count--; ?>">-</button>
        {{-- <button onclick="<?php $count++; ?> ?>">+</button>
        <button onclick="<?php $count--; ?> ?>">-</button> --}}
        <script>
            function increment() {
                document.getElementById('demoInput').stepUp();
            }

            function decrement() {
                document.getElementById('demoInput').stepDown();
            }
        </script>
        {{-- <img src={{ $menu->image }} alt={{ $menu->namaMenu }}> --}}
        <img src="img/{{ $image }}" alt={{ $menu->namaMenu }}>
    @endforeach=
    {{-- </form> --}}
    <script>
        $(document).ready(function() {

        });
    </script>
@endsection

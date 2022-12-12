@extends('layouts.main')

@section('container')
    <div class="card mx-auto" style="width: 18rem;">
        <div class="card-body mx-auto">

            <form action="/LoginPenjual" class="mx-auto">
                <button class="btn btn-lg btn-primary mb-3">
                    Login as Penjual
                </button>
            </form>
            <form action="/LoginKasir" class="mx-auto">
                <button class="btn btn-lg btn-primary mb-3">
                    Login as Kasir
                </button>
            </form>
            <form action="/HalamanUtamaPembeli" class="mx-auto">
                <button class="btn btn-lg btn-primary mb-3">
                    Login as Guest
                </button>
            </form>
        </div>
    </div>
    {{-- <h5>
        {{-- <a href="/LoginPenjual">Login as Penjual</a> --}}
    {{-- <a href="/LoginPenjual"></a>
    </h5> --}}
    {{-- <h5>
        <a href="/LoginKasir">Login as Kasir</a> --}}
    {{-- </h5>
    <h5>
        <a href="/HalamanUtamaPembeli">Login as Guest</a>
    </h5> --}}
@endsection

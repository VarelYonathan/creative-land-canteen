@extends('layouts.main')

@section('container')
    <div class="card mx-auto mt-5" style="width: 90%;">

        <ul class="list-group list-group-flush">
            @foreach ($pesanan as $p)
                <li class="list-group-item">
                    <div class="mb-3 row">
                        <label for="id" class="col-sm-2 col-form-label">Id Daftar Pesanan </label>
                        <div class="col-sm-10">
                            <input type="number" id="idDaftarPesanan" class="form-control-plaintext" name="idDaftarPesanan"
                                value={{ $p->daftarPesanan }} readonly>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama </label>
                        <div class="col-sm-10">
                            <input type="text" id="namaMenu" class="form-control-plaintext" name="namaMenu"
                                value={{ $p->namaMenu }} readonly>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="jumlah" class="col-sm-2 col-form-label">Jumlah Pesanan </label>
                        <div class="col-sm-10">
                            <input type="text" id="jumlahPesanan" class="form-control-plaintext" name="jumlahPesanan"
                                value={{ $p->jumlahPesanan }} readonly>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="status" class="col-sm-2 col-form-label">Status Pesanan </label>
                        <div class="col-sm-10">
                            @if ($p->statusPesanan === 1)
                                <input type="text" id="status" class="form-control-plaintext" name="status"
                                    value={{ 'Selesai' }} readonly>
                            @else
                                <input type="text" id="status" name="status" value={{ 'Belum' }} readonly>
                            @endif
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
        <form action="/HalamanUtamaPembeli" class="mt-2 mb-2 mx-auto" method="GET">
            <button class="btn btn-primary">
                Kembali
            </button>
        </form>
    </div>
@endsection

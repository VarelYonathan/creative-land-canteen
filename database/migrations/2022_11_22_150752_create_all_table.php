<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembeli', function (Blueprint $table) {
            $table->increments('idPembeli');
            $table->string('namaPembeli')->nullable();
            $table->integer('nomorMeja');
        });
        Schema::create('penjual', function (Blueprint $table) {
            $table->increments('idPenjual');
            $table->string('username', 30)->unique();
            $table->string('namaPenjual', 30);
            $table->string('password');
            // $table->integer('gerai')->unsigned();
        });
        Schema::create('gerai', function (Blueprint $table) {
            $table->increments('idGerai');
            $table->string('namaGerai', 50);
            $table->integer('penjual')->unsigned();
        });
        Schema::create('menu', function (Blueprint $table) {
            $table->increments('idMenu');
            $table->string('namaMenu', 50);
            $table->tinyInteger('stokMenu')->default(0);
            $table->double('hargaMenu');
            $table->integer('gerai')->unsigned();
        });
        Schema::create('kasir', function (Blueprint $table) {
            $table->increments('idKasir');
            $table->string('username', 30)->unique();
            $table->string('namaKasir', 30);
            $table->string('password');
        });
        Schema::create('invoice', function (Blueprint $table) {
            $table->increments('idInvoice');
            $table->integer('idPembeli')->unsigned();
            $table->integer('idKasir')->unsigned();
            $table->integer('idPenjual')->unsigned();
        });
        Schema::create('daftarpesanan', function (Blueprint $table) {
            $table->increments('idDaftarPesanan');
            $table->double('totalHarga')->default(0);
            $table->integer('gerai')->unsigned();
            $table->date('tanggalPemesanan');
            $table->integer('invoice')->unsigned();
            $table->tinyInteger('statusPembayaran')->default(0);
            $table->integer('pembeli')->unsigned();
            $table->integer('kasir')->unsigned()->nullable()->default(NULL);
        });
        Schema::create('pesanan', function (Blueprint $table) {
            $table->increments('idPesanan');
            $table->integer('pesanan')->unsigned();
            $table->integer('jumlahPesanan');
            $table->tinyInteger('statusPesanan')->default(0);
            $table->integer('daftarPesanan')->unsigned();
        });
        Schema::create('laporan', function (Blueprint $table) {
            $table->increments('idLaporan');
            $table->integer('kasir')->unsigned();
            $table->double('total')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembeli');
        Schema::dropIfExists('penjual');
        Schema::dropIfExists('gerai');
        Schema::dropIfExists('menu');
        Schema::dropIfExists('kasir');
        Schema::dropIfExists('invoice');
        Schema::dropIfExists('daftarpesanan');
        Schema::dropIfExists('pesanan');
        Schema::dropIfExists('laporan');
    }
};
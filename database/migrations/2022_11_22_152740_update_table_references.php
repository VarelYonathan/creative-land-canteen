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
        Schema::table('daftarpesanan', function (Blueprint $table) {
            $table->foreign('invoice')->references('idInvoice')->on('invoice');
            $table->foreign('kasir')->references('idKasir')->on('kasir');
        });

        Schema::table('gerai', function (Blueprint $table) {
            $table->foreign('penjual')->references('idPenjual')->on('penjual');
        });

        Schema::table('invoice', function (Blueprint $table) {
            $table->foreign('idKasir')->references('idKasir')->on('kasir');
            $table->foreign('idPembeli')->references('idPembeli')->on('pembeli');
            $table->foreign('idPenjual')->references('idPenjual')->on('penjual');
        });

        Schema::table('laporan', function (Blueprint $table) {
            $table->foreign('kasir')->references('idKasir')->on('kasir');
        });

        Schema::table('menu', function (Blueprint $table) {
            $table->foreign('gerai')->references('idGerai')->on('gerai');
        });

        Schema::table('penjual', function (Blueprint $table) {
            $table->foreign('gerai')->references('idGerai')->on('gerai');
        });

        Schema::table('pesanan', function (Blueprint $table) {
            $table->foreign('daftarPesanan')->references('idDaftarPesanan')->on('daftarpesanan');
            $table->foreign('pesanan')->references('idMenu')->on('menu');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('daftarpesanan', function (Blueprint $table) {
            $table->dropForeign(['invoice']);
            $table->dropForeign(['kasir']);
        });

        Schema::table('gerai', function (Blueprint $table) {
            $table->dropForeign(['penjual']);
        });

        Schema::table('invoice', function (Blueprint $table) {
            $table->dropForeign(['idKasir']);
            $table->dropForeign(['idPembeli']);
            $table->dropForeign(['idPenjual']);
        });

        Schema::table('laporan', function (Blueprint $table) {
            $table->dropForeign(['kasir']);
        });

        Schema::table('menu', function (Blueprint $table) {
            $table->dropForeign(['gerai']);
        });

        Schema::table('penjual', function (Blueprint $table) {
            $table->dropForeign(['gerai']);
        });

        Schema::table('pesanan', function (Blueprint $table) {
            $table->dropForeign(['daftarPesanan']);
            $table->dropForeign(['pesanan']);
        });
    }
};
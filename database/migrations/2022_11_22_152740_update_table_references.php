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
            $table->foreign('invoice')->references('id')->on('invoice')->onDelete('cascade');
            $table->foreign('gerai')->references('id')->on('gerai')->onDelete('cascade');
            $table->foreign('pembeli')->references('id')->on('pembeli')->onDelete('cascade');
            // $table->foreign('kasir')->references('id')->on('kasir')->onDelete('cascade');
        });

        Schema::table('gerai', function (Blueprint $table) {
            $table->foreign('penjual')->references('id')->on('penjual')->onDelete('cascade');
        });

        Schema::table('invoice', function (Blueprint $table) {
            $table->foreign('idKasir')->references('id')->on('kasir')->onDelete('cascade');
            $table->foreign('idPembeli')->references('id')->on('pembeli')->onDelete('cascade');
            $table->foreign('idPenjual')->references('id')->on('penjual')->onDelete('cascade');
        });

        Schema::table('laporan', function (Blueprint $table) {
            $table->foreign('kasir')->references('id')->on('kasir')->onDelete('cascade');
        });

        Schema::table('menu', function (Blueprint $table) {
            $table->foreign('gerai')->references('id')->on('gerai')->onDelete('cascade');
        });

        // Schema::table('penjual', function (Blueprint $table) {
        //     $table->foreign('gerai')->references('idGerai')->on('gerai');
        // });

        Schema::table('pesanan', function (Blueprint $table) {
            $table->foreign('daftarPesanan')->references('id')->on('daftarpesanan')->onDelete('cascade');
            $table->foreign('pesanan')->references('id')->on('menu')->onDelete('cascade');
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
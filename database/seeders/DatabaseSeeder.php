<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;use app\Models\Gerai;
use App\Models\DaftarPesanan;
use App\Models\Gerai;
use App\Models\Invoice;
use App\Models\Kasir;
use App\Models\Menu;
use App\Models\Laporan;
use App\Models\Penjual;
use App\Models\Pembeli;
use App\Models\Pesanan;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Pembeli::factory(4)->create();
        Penjual::factory(2)->create();
        Kasir::factory(2)->create();
        laporan::factory(1)->create();
        Invoice::factory(4)->create();
        Gerai::factory(2)->create();
        DaftarPesanan::factory(4)->create();
        Menu::factory(4)->create();
        Pesanan::factory(4)->create();

        // Menu::create([]);
    }
}
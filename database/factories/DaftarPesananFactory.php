<?php

namespace Database\Factories;

use DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DaftarPesanan>
 */
class DaftarPesananFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'totalHarga' => mt_rand(8000, 40000),
            'gerai' => mt_rand(1, 2),
            // 'tanggalPemesanan' => fake()->DateTime(),
            'invoice' => mt_rand(1, 4),
            'statusPembayaran' => mt_rand(0, 1),
            'konfirmasi' => mt_rand(0, 1),
            'pembeli' => mt_rand(1, 4)
            // 'kasir' => mt_rand(1, 2)
        ];
    }
}
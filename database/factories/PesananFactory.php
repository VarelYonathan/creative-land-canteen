<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pesanan>
 */
class PesananFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'pesanan' => mt_rand(1, 4),
            'jumlahPesanan' => mt_rand(1, 2),
            'statusPesanan' => 0,
            'daftarPesanan' => mt_rand(1, 4)
        ];
    }
}
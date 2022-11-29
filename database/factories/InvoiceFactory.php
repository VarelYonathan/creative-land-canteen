<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'idPembeli' => mt_rand(1, 4),
            'idKasir' => mt_rand(1, 2),
            'idPenjual' => mt_rand(1, 2)
        ];
    }
}
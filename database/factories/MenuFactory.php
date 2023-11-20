<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Menu>
 */
class MenuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'namaMenu' => fake()->numerify('makanan-#'),
            'stokMenu' => mt_rand(0, 1),
            'hargaMenu' => mt_rand(8000, 20000),
            'gerai' => mt_rand(1, 1)
        ];
    }
}
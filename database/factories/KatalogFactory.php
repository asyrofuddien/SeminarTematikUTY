<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class KatalogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_produk' => $this->faker->name(),
            'slug' => $this->faker->slug(),
            'harga' => mt_rand(1000000,4000000),
            'excerpt' => $this->faker->paragraph(),
            'deskripsi' => collect($this->faker->paragraphs(mt_rand(5,10)))
            ->map(fn($p) => "<p>$p</p>")->implode(''),
            'user_id' => mt_rand(1,4),
            'kategori_id' => mt_rand(1,4)
        ];
    }
}

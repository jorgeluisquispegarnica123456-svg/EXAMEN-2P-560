<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Categoria;

class ProductoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'categoria_id' => Categoria::factory(),
            'nombre' => $this->faker->words(3, true),
            'sku' => 'SKU-' . strtoupper($this->faker->unique()->bothify('###-????')),
            'precio' => $this->faker->randomFloat(2, 10, 1000),
            'stock' => $this->faker->numberBetween(1, 100),
            'disponible' => true,
        ];
    }
}

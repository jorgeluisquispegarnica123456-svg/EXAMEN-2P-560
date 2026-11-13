<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;
use App\Models\Producto;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Categoria::factory(5)->create()->each(function ($categoria) {
            Producto::factory(4)->create([
                'categoria_id' => $categoria->id,
            ]);
        });
    }
}
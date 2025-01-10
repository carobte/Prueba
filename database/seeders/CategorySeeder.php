<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Crear categorías de ejemplo
        Category::create(['name' => 'comida']);
        Category::create(['name' => 'transporte']);
        Category::create(['name' => 'ocio']);
        Category::create(['name' => 'salud']);
        Category::create(['name' => 'vivienda']);
    }
}

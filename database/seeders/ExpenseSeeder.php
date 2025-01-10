<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Expense;
use App\Models\Category;

class ExpenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $categories = Category::all();

        // Create expense examples
        
        Expense::create([
            'description' => 'compra de comida en supermercado',
            'amount' => 150000,  
            'date' => '2025-01-01', 
            'category_id' => $categories->random()->id,  // Random category
        ]);

        Expense::create([
            'description' => 'transporte en taxi',
            'amount' => 20000,
            'date' => '2025-01-02',
            'category_id' => $categories->random()->id,
        ]);

        Expense::create([
            'description' => 'cena en restaurante',
            'amount' => 54000,
            'date' => '2025-01-03',
            'category_id' => $categories->random()->id,
        ]);

        Expense::create([
            'description' => 'compra de ropa',
            'amount' => 500,
            'date' => '2025-01-04',
            'category_id' => $categories->random()->id,
        ]);

        Expense::create([
            'description' => 'medicamentos',
            'amount' => 300,
            'date' => '2025-01-05',
            'category_id' => $categories->random()->id,
        ]);
    }
}

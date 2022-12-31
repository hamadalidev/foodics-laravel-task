<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $IngredientData = [
            ['name' => 'Beef',
                'stock' => ['new_stock' => 20000],
            ],
            ['name' => 'Cheese',
                'stock' => ['new_stock' => 5000],
            ],
            ['name' => 'Onion',
                'stock' => ['new_stock' => 1000],
            ],
        ];

        foreach ($IngredientData as $data) {
            $ingredient = Ingredient::firstOrCreate(Arr::except($data, 'stock'));
            if ($ingredient->ingredientStocks) {
                $ingredientStocks = $ingredient->ingredientStocks;
                $ingredientStocks->total_quantity = $ingredient->ingredientStocks->remaining_quantity + $data['stock']['new_stock'];
                $ingredientStocks->save();
            } else {
                $ingredient->ingredientStocks()->create(['total_quantity' => $data['stock']['new_stock']]);
            }
        }
    }
}
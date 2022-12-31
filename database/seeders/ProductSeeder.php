<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            ['name' => 'Burger',
                'ingredients' => [
                    ['name' => 'Beef', 'quantity' => 150],
                    ['name' => 'Cheese', 'quantity' => 30],
                    ['name' => 'Onion',  'quantity' => 20],
                ],
            ],
            ['name' => 'Pizza',
                'ingredients' => [
                    ['name' => 'Cheese', 'quantity' => 250],
                    ['name' => 'Onion',  'quantity' => 50],
                    ['name' => 'Beef', 'quantity' => 250],
                    ['name' => 'Flour', 'quantity' => 1000],
                ],
            ],
        ];
        foreach ($products as $productRow) {
            $product = Product::firstOrCreate(Arr::except($productRow, 'ingredients'));
            foreach ($productRow['ingredients'] as $ingredientRow) {
                $ingredients = Ingredient::whereName($ingredientRow['name'])->firstOrFail();
                $product->productIngredients()->firstOrCreate(
                    ['product_id' => $product->id, 'ingredient_id' => $ingredients->id],
                    ['product_id' => $product->id, 'ingredient_id' => $ingredients->id, 'quantity' => $ingredientRow['quantity']]);
            }
        }
    }
}

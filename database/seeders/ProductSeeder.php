<?php

namespace Database\Seeders;

use App\Services\ProductService;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = config('constants.products');
        foreach ($products as $product) {
            $productService = App::make(ProductService::class);
            $productService->saveProductWithIngredient($product);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Services\IngredientService;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ingredientService = App::make(IngredientService::class);
        $ingredients = config('constants.ingredients');
        foreach ($ingredients as $data) {
            $ingredientService->saveIngredientWithStock($data);
        }
    }
}

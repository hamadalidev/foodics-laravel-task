<?php

namespace Tests\Feature;

use App\Models\IngredientStock;
use App\Models\Product;
use Tests\TestCase;

class OrderTest extends TestCase
{
    /**
     * Test Order create API.
     *
     * @return void
     */
    public function test_order_create()
    {
        $beforProduct = Product::whereId(1)->with('productIngredients.ingredient.ingredientStock')->first();

        $response = $this->postJson('/api/order/', [
            'products' => [['product_id' => 1,
                'quantity' => 1]],
        ]);

        //check order api status code
        $response->assertCreated();

        //check order save successfully
        $this->assertDatabaseHas('orders', ['order_number' => $response['data']['order_id']]);

        //check stock was correctly updated after the order.
        foreach ($beforProduct->productIngredients as $productIngredient) {
            $beforOrder = $productIngredient->ingredient->ingredientStock;
            $afterOrder = IngredientStock::find($beforOrder->id);
            $this->assertEquals(($beforOrder->remaining_quantity - $productIngredient->quantity), $afterOrder->remaining_quantity);
        }
    }

    /**
     * Test Order create API validation
     *
     * @return void
     */
    public function test_order_create_validation()
    {
        $response = $this->postJson('/api/order/', [
            'products' => []]);

        $response->assertStatus(422);
    }

    /**
     * Test Order create API validation, if stock is not avaliable.
     *
     * @return void
     */
    public function test_order_create_stock_not_validation()
    {
        $response = $this->postJson('/api/order/', [
            'products' => [['product_id' => 1,
                'quantity' => 88888888888888888]],
        ]);

        $response->assertStatus(422);
    }
}

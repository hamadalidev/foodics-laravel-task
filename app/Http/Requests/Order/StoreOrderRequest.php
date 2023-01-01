<?php

namespace App\Http\Requests\Order;

use App\Models\Product;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Services\IngredientStockService;
use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
    private ProductRepositoryInterface $productRepository;

    /**
     * @param  ProductRepositoryInterface  $productRepository
     */
    public function __construct(ProductRepositoryInterface $productRepository, private IngredientStockService $ingredientStockService)
    {
        $this->productRepository = $productRepository;
    }

    public function rules()
    {
        return [
            'products' => 'required|array',
            'products.*.product_id' => 'required|integer|exists:products,id',
            'products.*.quantity' => 'required|integer|min:1',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if (! $this->validateOrderIngredient()) {
                $validator->errors()->add('order_ingredient', 'Ingredient Stock in not available for this order');
            }
        });
    }

    /**
     * This function is use for check order product Ingredients stock is available or not
     *
     * @return bool
     */
    private function validateOrderIngredient(): bool
    {
        if (! $this->products) {
            return  true;
        }
        $orderIngredients = [];

        // get all order product ingredients  to check order check validaiton.
        foreach ($this->products as $productOrder) {
            $product = $this->productRepository->find($productOrder['product_id']);
            if ($product) {
                $productIngredients = $product->productIngredients;
                foreach ($productIngredients as $productIngredient) {
                    if (! isset($orderIngredients[$productIngredient->ingredient_id])) {
                        $orderIngredients[$productIngredient->ingredient_id] = $productIngredient->quantity * $productOrder['quantity'];
                    } else {
                        $orderIngredients[$productIngredient->ingredient_id] = $orderIngredients[$productIngredient->ingredient_id] + ($productIngredient->quantity * $productOrder['quantity']);
                    }
                }
            }
        }

        return $this->ingredientStockService->isOrderIngredientStockAvailable($orderIngredients);
    }
}

<?php

namespace App\Http\Requests\Order;

use App\Models\IngredientStock;
use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
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
                $validator->errors()->add('order_ingredient', trans('exception.invalid_ticket_type_sku_ids'));
            }
        });
    }

    private function validateOrderIngredient()
    {
        $ingArray = [];
        foreach ($this->products as $productOrder) {
            $product = Product::find($productOrder['product_id']);
            if ($product) {
                $ing = $product->productIngredients;
                foreach ($ing as $in) {
                    if (! isset($ingArray[$in->ingredient_id])) {
                        $ingArray[$in->ingredient_id] = $in->quantity * $productOrder['quantity'];
                    } else {
                        $ingArray[$in->ingredient_id] = $ingArray[$in->ingredient_id] + ($in->quantity * $productOrder['quantity']);
                    }
                }
            }
        }

        foreach ($ingArray as $key => $in) {
            $inarrrar[] = [['remaining_quantity', '<', $in], ['ingredient_id',  $key]];
        }

        $q = IngredientStock::query();
        foreach ($inarrrar as $con) {
            $q->orWhere($con);
        }

        return ! $q->exists();
    }
}

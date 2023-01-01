<?php

namespace App\Providers;

use App\Repositories\Ingredient\IngredientRepository;
use App\Repositories\Ingredient\IngredientRepositoryInterface;
use App\Repositories\IngredientStock\IngredientStockRepository;
use App\Repositories\IngredientStock\IngredientStockRepositoryInterface;
use App\Repositories\Order\OrderRepository;
use App\Repositories\Order\OrderRepositoryInterface;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(OrderRepositoryInterface::class, OrderRepository::class);
        $this->app->bind(IngredientRepositoryInterface::class, IngredientRepository::class);
        $this->app->bind(IngredientStockRepositoryInterface::class, IngredientStockRepository::class);
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
    }
}

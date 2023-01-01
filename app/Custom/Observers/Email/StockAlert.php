<?php

namespace App\Custom\Observers\Email;

use App\Custom\Observers\BaseObserver;
use App\Jobs\Email\StockAlertJobEmail;

class StockAlert extends BaseObserver
{
    public static $listen = ['stock.below.alert'];

    public function handle(string $product)
    {
        StockAlertJobEmail::dispatch($product);
    }
}

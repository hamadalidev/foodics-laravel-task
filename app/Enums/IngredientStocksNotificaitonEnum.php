<?php

namespace App\Enums;

use ArchTech\Enums\InvokableCases;

enum IngredientStocksNotificaitonEnum: string
{
    use InvokableCases;

    case NOT_SEND = 'not_send';
    case SEND = 'send';
}

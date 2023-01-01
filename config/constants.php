<?php

return [
    'ingredients' => [
        ['name' => 'Beef',
            'stock' => ['new_stock' => 20000],
        ],
        ['name' => 'Cheese',
            'stock' => ['new_stock' => 5000],
        ],
        ['name' => 'Onion',
            'stock' => ['new_stock' => 1000],
        ],
        ['name' => 'Flour',
            'stock' => ['new_stock' => 50000],
        ],
    ],
    'products' => [
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
    ],
];

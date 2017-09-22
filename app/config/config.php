<?php

return [
    'api_routing' => [
        '/category/all' => [
            '_controller' => \app\Application\CategoryController::class,
            '_method' => 'getAllCategoriesAction',
        ],
    ],
];
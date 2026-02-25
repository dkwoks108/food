<?php
declare(strict_types=1);

return [
    'GET' => [
        '/' => ['App\\Controllers\\HomeController', 'index'],
        '/brands' => ['App\\Controllers\\BrandsController', 'index'],
        '/chefs' => ['App\\Controllers\\ChefsController', 'index'],
        '/products' => ['App\\Controllers\\ProductsController', 'index'],
        '/reviews' => ['App\\Controllers\\ReviewsController', 'index'],
        '/contact' => ['App\\Controllers\\ContactController', 'index'],
        '/new-launch/khoobi-water' => ['App\\Controllers\\LaunchController', 'khoobi'],
    ],
    'POST' => [
        '/contact' => ['App\\Controllers\\ContactController', 'submit'],
    ],
];

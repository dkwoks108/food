<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Models\ProductRepository;

class ProductsController extends BaseController
{
    public function index(array $params = []): string
    {
        $repository = new ProductRepository();

        return $this->render('products', [
            'title' => 'Products',
            'metaDescription' => 'Explore our biryani menu crafted with authentic flavor.',
            'productsByCategory' => $repository->groupedByCategory(),
        ]);
    }
}

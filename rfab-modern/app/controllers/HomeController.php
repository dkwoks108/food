<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Models\BrandRepository;
use App\Models\ChefRepository;
use App\Models\ProductRepository;
use App\Models\ReviewRepository;

class HomeController extends BaseController
{
    public function index(array $params = []): string
    {
        $brands = (new BrandRepository())->all();
        $chefs = array_slice((new ChefRepository())->all(), 0, 4);
        $products = array_slice((new ProductRepository())->all(), 0, 8);
        $reviews = (new ReviewRepository())->all();

        return $this->render('home', [
            'title' => 'Home',
            'metaDescription' => 'Roshani Foods & Beverages — The authentic cloud kitchen chain.',
            'brands' => $brands,
            'chefs' => $chefs,
            'products' => $products,
            'reviews' => $reviews,
        ]);
    }
}

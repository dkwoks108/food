<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Models\BrandRepository;

class BrandsController extends BaseController
{
    public function index(array $params = []): string
    {
        return $this->render('brands', [
            'title' => 'Brands',
            'metaDescription' => 'Explore RFAB authentic biryani brands and order links.',
            'brands' => (new BrandRepository())->all(),
        ]);
    }
}

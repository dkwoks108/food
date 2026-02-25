<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Models\ChefRepository;

class ChefsController extends BaseController
{
    public function index(array $params = []): string
    {
        return $this->render('chefs', [
            'title' => 'Chefs',
            'metaDescription' => 'Meet our expert chefs crafting authentic biryani.',
            'chefs' => (new ChefRepository())->all(),
        ]);
    }
}

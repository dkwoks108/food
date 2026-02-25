<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Models\ReviewRepository;

class ReviewsController extends BaseController
{
    public function index(array $params = []): string
    {
        return $this->render('reviews', [
            'title' => 'Reviews',
            'metaDescription' => 'What our customers say about RFAB biryani experiences.',
            'reviews' => (new ReviewRepository())->all(),
        ]);
    }
}

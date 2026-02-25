<?php
declare(strict_types=1);

namespace App\Models;

class ReviewRepository extends JsonRepository
{
    public function all(): array
    {
        return $this->read('reviews.json');
    }
}

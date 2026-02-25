<?php
declare(strict_types=1);

namespace App\Models;

class BrandRepository extends JsonRepository
{
    public function all(): array
    {
        return $this->read('brands.json');
    }
}

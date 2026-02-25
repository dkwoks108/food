<?php
declare(strict_types=1);

namespace App\Models;

class ProductRepository extends JsonRepository
{
    public function all(): array
    {
        return $this->read('products.json');
    }

    public function groupedByCategory(): array
    {
        $groups = [];
        foreach ($this->all() as $item) {
            $category = $item['category'] ?? 'Other';
            $groups[$category][] = $item;
        }

        ksort($groups);
        return $groups;
    }
}

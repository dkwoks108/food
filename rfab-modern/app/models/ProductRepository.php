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

        uksort($groups, static function (string $a, string $b) use ($groups): int {
            $countDiff = count($groups[$b]) <=> count($groups[$a]);
            if ($countDiff !== 0) {
                return $countDiff;
            }

            return strcasecmp($a, $b);
        });

        return $groups;
    }
}

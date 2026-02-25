<?php
declare(strict_types=1);

namespace App\Models;

class ChefRepository extends JsonRepository
{
    public function all(): array
    {
        return $this->read('chefs.json');
    }
}

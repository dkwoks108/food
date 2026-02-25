<?php
declare(strict_types=1);

namespace App\Models;

class SiteRepository extends JsonRepository
{
    public function info(): array
    {
        return $this->read('site.json');
    }
}

<?php
declare(strict_types=1);

namespace App\Models;

abstract class JsonRepository
{
    protected function read(string $fileName): array
    {
        $file = APP_ROOT . '/data/' . $fileName;
        if (!is_file($file)) {
            return [];
        }

        $decoded = json_decode((string) file_get_contents($file), true);
        return is_array($decoded) ? $decoded : [];
    }
}

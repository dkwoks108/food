<?php
declare(strict_types=1);

namespace App\Services;

class Cache
{
    public function remember(string $key, callable $resolver, int $ttl = 300): mixed
    {
        $file = STORAGE_ROOT . '/cache/data/' . md5($key) . '.cache';

        if (is_file($file) && (time() - filemtime($file)) < $ttl) {
            $raw = (string) file_get_contents($file);
            $value = @unserialize($raw, ['allowed_classes' => false]);
            if ($value !== false || $raw === serialize(false)) {
                return $value;
            }
        }

        $value = $resolver();
        @file_put_contents($file, serialize($value));
        return $value;
    }
}

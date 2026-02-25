<?php
declare(strict_types=1);

namespace App\Models;

class ContactRepository
{
    public function store(array $payload): bool
    {
        $file = STORAGE_ROOT . '/logs/contact-messages.log';
        $line = json_encode([
            'timestamp' => date('c'),
            'ip' => $_SERVER['REMOTE_ADDR'] ?? 'unknown',
            'payload' => $payload,
        ], JSON_UNESCAPED_UNICODE);

        return (bool) @file_put_contents($file, $line . PHP_EOL, FILE_APPEND);
    }
}

<?php
declare(strict_types=1);

namespace App\Middleware;

class RateLimit
{
    public static function allow(string $key, int $maxAttempts = 5, int $windowSeconds = 60): bool
    {
        $now = time();
        $bucket = $_SESSION['_rate_limit'][$key] ?? ['start' => $now, 'count' => 0];

        if (($now - (int) $bucket['start']) > $windowSeconds) {
            $bucket = ['start' => $now, 'count' => 0];
        }

        $bucket['count']++;
        $_SESSION['_rate_limit'][$key] = $bucket;

        return $bucket['count'] <= $maxAttempts;
    }
}

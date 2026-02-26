<?php
declare(strict_types=1);

namespace App\Services;

class Router
{
    public function __construct(private readonly array $routes)
    {
    }

    public function resolve(string $uri, string $method): array
    {
        $path = parse_url($uri, PHP_URL_PATH) ?: '/';
        $path = $this->normalizePath($path);
        $method = strtoupper($method);

        $handler = $this->routes[$method][$path] ?? null;

        if (!$handler) {
            return ['App\\Controllers\\ErrorController', 'notFound', []];
        }

        return [$handler[0], $handler[1], []];
    }

    private function normalizePath(string $path): string
    {
        $path = rawurldecode($path);

        $scriptName = str_replace('\\', '/', (string) ($_SERVER['SCRIPT_NAME'] ?? ''));
        $scriptDir = str_replace('\\', '/', dirname($scriptName));

        if ($scriptDir !== '/' && $scriptDir !== '.' && str_starts_with($path, $scriptDir . '/')) {
            $path = substr($path, strlen($scriptDir));
        }

        if ($path === '/index.php') {
            $path = '/';
        } elseif (str_starts_with($path, '/index.php/')) {
            $path = substr($path, strlen('/index.php'));
        }

        if ($path !== '/' && str_ends_with($path, '/')) {
            $path = rtrim($path, '/');
        }

        return $path === '' ? '/' : $path;
    }
}

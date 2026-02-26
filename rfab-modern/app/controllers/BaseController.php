<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Models\SiteRepository;
use App\Services\View;

abstract class BaseController
{
    protected function render(string $page, array $data = [], int $statusCode = 200): string
    {
        http_response_code($statusCode);
        $site = (new SiteRepository())->info();

        return View::render($page, array_merge($data, [
            'site' => $site,
            'currentPath' => $this->currentPath(),
        ]));
    }

    protected function redirect(string $path): void
    {
        header('Location: ' . $path);
        exit;
    }

    private function currentPath(): string
    {
        $path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
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

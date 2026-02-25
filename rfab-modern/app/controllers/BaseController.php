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
            'currentPath' => parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/',
        ]));
    }

    protected function redirect(string $path): void
    {
        header('Location: ' . $path);
        exit;
    }
}

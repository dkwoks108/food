<?php
declare(strict_types=1);

namespace App\Services;

class View
{
    public static function render(string $page, array $data = []): string
    {
        extract($data, EXTR_SKIP);

        ob_start();
        require APP_ROOT . '/views/pages/' . $page . '.php';
        $content = (string) ob_get_clean();

        ob_start();
        require APP_ROOT . '/views/layouts/base.php';
        return (string) ob_get_clean();
    }
}

<?php
declare(strict_types=1);

session_start();

define('BASE_PATH', dirname(__DIR__));
define('APP_ROOT', BASE_PATH . '/app');
define('PUBLIC_ROOT', BASE_PATH . '/public');
define('STORAGE_ROOT', BASE_PATH . '/storage');

spl_autoload_register(static function (string $class): void {
    $prefix = 'App\\';
    if (!str_starts_with($class, $prefix)) {
        return;
    }

    $relativeClass = substr($class, strlen($prefix));
    $parts = explode('\\', $relativeClass);
    if ($parts !== []) {
        $parts[0] = strtolower($parts[0]);
    }

    $relative = implode('/', $parts);
    $file = APP_ROOT . '/' . $relative . '.php';

    if (is_file($file)) {
        require $file;
    }
});

App\Middleware\SecurityHeaders::apply();

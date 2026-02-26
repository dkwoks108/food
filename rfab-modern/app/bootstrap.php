<?php
declare(strict_types=1);

$isHttps = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
    || (($_SERVER['SERVER_PORT'] ?? null) === '443')
    || (($_SERVER['HTTP_X_FORWARDED_PROTO'] ?? '') === 'https');

session_set_cookie_params([
    'lifetime' => 0,
    'path' => '/',
    'domain' => '',
    'secure' => $isHttps,
    'httponly' => true,
    'samesite' => 'Lax',
]);

session_name('RFABSESSID');
session_start();

if (!headers_sent()) {
    header_remove('X-Powered-By');
}

if (!isset($_SESSION['__session_regenerated'])) {
    session_regenerate_id(true);
    $_SESSION['__session_regenerated'] = time();
}

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

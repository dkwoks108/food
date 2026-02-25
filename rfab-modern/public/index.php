<?php
declare(strict_types=1);

require __DIR__ . '/../app/bootstrap.php';

use App\Services\Router;

$routes = require APP_ROOT . '/config/routes.php';
$router = new Router($routes);

[$controllerClass, $action, $params] = $router->resolve($_SERVER['REQUEST_URI'] ?? '/', $_SERVER['REQUEST_METHOD'] ?? 'GET');

$controller = new $controllerClass();
echo $controller->$action($params);

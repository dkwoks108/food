<?php
declare(strict_types=1);

namespace App\Controllers;

class ErrorController extends BaseController
{
    public function notFound(array $params = []): string
    {
        return $this->render('error-404', [
            'title' => 'Page Not Found',
            'metaDescription' => 'The page you are looking for does not exist.',
        ], 404);
    }
}

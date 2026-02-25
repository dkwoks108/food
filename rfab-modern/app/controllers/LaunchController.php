<?php
declare(strict_types=1);

namespace App\Controllers;

class LaunchController extends BaseController
{
    public function khoobi(array $params = []): string
    {
        return $this->render('launch-khoobi', [
            'title' => 'New Launch - Khoobi Water',
            'metaDescription' => 'Introducing Khoobi Alkaline Water by RFAB.',
        ]);
    }
}

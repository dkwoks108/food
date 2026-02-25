<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Middleware\RateLimit;
use App\Models\ContactRepository;
use App\Services\Mailer;
use App\Services\Validator;

class ContactController extends BaseController
{
    public function index(array $params = []): string
    {
        $flash = $_SESSION['contact_flash'] ?? null;
        $old = $_SESSION['contact_old'] ?? [];
        $errors = $_SESSION['contact_errors'] ?? [];

        unset($_SESSION['contact_flash'], $_SESSION['contact_old'], $_SESSION['contact_errors']);

        return $this->render('contact', [
            'title' => 'Contact',
            'metaDescription' => 'Get in touch with RFAB for partnerships and ordering support.',
            'flash' => $flash,
            'old' => $old,
            'errors' => $errors,
        ]);
    }

    public function submit(array $params = []): string
    {
        if (!RateLimit::allow('contact_form', 5, 60)) {
            $_SESSION['contact_flash'] = ['type' => 'error', 'message' => 'Too many requests. Please try again in a minute.'];
            $this->redirect('/contact');
        }

        $payload = [
            'first_name' => trim((string) ($_POST['first_name'] ?? '')),
            'last_name' => trim((string) ($_POST['last_name'] ?? '')),
            'email' => trim((string) ($_POST['email'] ?? '')),
            'subject' => trim((string) ($_POST['subject'] ?? '')),
            'message' => trim((string) ($_POST['message'] ?? '')),
        ];

        $validator = new Validator();
        $errors = $validator->validateContact($payload);

        if ($errors !== []) {
            $_SESSION['contact_errors'] = $errors;
            $_SESSION['contact_old'] = $payload;
            $_SESSION['contact_flash'] = ['type' => 'error', 'message' => 'Please fix the highlighted fields.'];
            $this->redirect('/contact');
        }

        (new ContactRepository())->store($payload);

        $config = require APP_ROOT . '/config/app.php';
        (new Mailer())->sendContactNotification($payload, $config['contact_email']);

        $_SESSION['contact_flash'] = ['type' => 'success', 'message' => 'Thanks! Your message has been submitted successfully.'];
        $this->redirect('/contact');
    }
}

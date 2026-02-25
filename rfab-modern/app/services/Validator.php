<?php
declare(strict_types=1);

namespace App\Services;

class Validator
{
    public function validateContact(array $input): array
    {
        $errors = [];

        if (trim((string) ($input['first_name'] ?? '')) === '') {
            $errors['first_name'] = 'First name is required.';
        }

        if (trim((string) ($input['last_name'] ?? '')) === '') {
            $errors['last_name'] = 'Last name is required.';
        }

        $email = trim((string) ($input['email'] ?? ''));
        if ($email === '') {
            $errors['email'] = 'Email is required.';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Please enter a valid email address.';
        }

        if (trim((string) ($input['subject'] ?? '')) === '') {
            $errors['subject'] = 'Subject is required.';
        }

        if (mb_strlen(trim((string) ($input['message'] ?? ''))) < 10) {
            $errors['message'] = 'Message should be at least 10 characters.';
        }

        return $errors;
    }
}

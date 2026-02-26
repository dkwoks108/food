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
        } elseif (mb_strlen((string) ($input['first_name'] ?? '')) > 80) {
            $errors['first_name'] = 'First name is too long.';
        }

        if (trim((string) ($input['last_name'] ?? '')) === '') {
            $errors['last_name'] = 'Last name is required.';
        } elseif (mb_strlen((string) ($input['last_name'] ?? '')) > 80) {
            $errors['last_name'] = 'Last name is too long.';
        }

        $email = trim((string) ($input['email'] ?? ''));
        if ($email === '') {
            $errors['email'] = 'Email is required.';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Please enter a valid email address.';
        }

        if (trim((string) ($input['subject'] ?? '')) === '') {
            $errors['subject'] = 'Subject is required.';
        } elseif (mb_strlen((string) ($input['subject'] ?? '')) > 160) {
            $errors['subject'] = 'Subject is too long.';
        }

        $messageLength = mb_strlen(trim((string) ($input['message'] ?? '')));
        if ($messageLength < 10) {
            $errors['message'] = 'Message should be at least 10 characters.';
        } elseif ($messageLength > 4000) {
            $errors['message'] = 'Message is too long.';
        }

        return $errors;
    }
}

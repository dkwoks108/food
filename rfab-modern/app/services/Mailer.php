<?php
declare(strict_types=1);

namespace App\Services;

class Mailer
{
    public function sendContactNotification(array $payload, string $to): bool
    {
        $subject = 'RFAB Contact Form: ' . ($payload['subject'] ?? 'New inquiry');
        $message = "Name: " . ($payload['first_name'] ?? '') . ' ' . ($payload['last_name'] ?? '') . PHP_EOL
            . "Email: " . ($payload['email'] ?? '') . PHP_EOL
            . "Message:" . PHP_EOL . ($payload['message'] ?? '');

        $headers = [
            'MIME-Version: 1.0',
            'Content-type: text/plain; charset=UTF-8',
            'From: noreply@rfab.in',
            'Reply-To: ' . ($payload['email'] ?? 'noreply@rfab.in'),
        ];

        if (function_exists('mail')) {
            return @mail($to, $subject, $message, implode("\r\n", $headers));
        }

        return false;
    }
}

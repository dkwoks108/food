<?php
declare(strict_types=1);

namespace App\Services;

class Mailer
{
    private function cleanHeaderValue(string $value): string
    {
        return trim(str_replace(["\r", "\n"], '', $value));
    }

    private function safeEmail(string $value, string $fallback): string
    {
        $clean = $this->cleanHeaderValue($value);
        return filter_var($clean, FILTER_VALIDATE_EMAIL) ? $clean : $fallback;
    }

    public function sendContactNotification(array $payload, string $to): bool
    {
        $subject = 'RFAB Contact Form: ' . $this->cleanHeaderValue((string) ($payload['subject'] ?? 'New inquiry'));
        $message = "Name: " . ($payload['first_name'] ?? '') . ' ' . ($payload['last_name'] ?? '') . PHP_EOL
            . "Email: " . ($payload['email'] ?? '') . PHP_EOL
            . "Message:" . PHP_EOL . ($payload['message'] ?? '');

        $to = $this->safeEmail($to, 'roshanifoodsandbevrages@gmail.com');
        $replyTo = $this->safeEmail((string) ($payload['email'] ?? ''), 'noreply@rfab.in');

        $headers = [
            'MIME-Version: 1.0',
            'Content-type: text/plain; charset=UTF-8',
            'From: noreply@rfab.in',
            'Reply-To: ' . $replyTo,
        ];

        if (function_exists('mail')) {
            return @mail($to, $subject, $message, implode("\r\n", $headers));
        }

        return false;
    }
}

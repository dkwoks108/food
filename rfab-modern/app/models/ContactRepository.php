<?php
declare(strict_types=1);

namespace App\Models;

use App\Services\Database;
use PDO;
use Throwable;

class ContactRepository
{
    public function store(array $payload): bool
    {
        $pdo = Database::connection();
        if ($pdo instanceof PDO && $this->storeInDatabase($pdo, $payload)) {
            return true;
        }

        $file = STORAGE_ROOT . '/logs/contact-messages.log';
        $line = json_encode([
            'timestamp' => date('c'),
            'ip' => $_SERVER['REMOTE_ADDR'] ?? 'unknown',
            'payload' => $payload,
        ], JSON_UNESCAPED_UNICODE);

        return (bool) @file_put_contents($file, $line . PHP_EOL, FILE_APPEND);
    }

    private function storeInDatabase(PDO $pdo, array $payload): bool
    {
        try {
            $stmt = $pdo->prepare('INSERT INTO contact_messages (first_name, last_name, email, subject, message, ip_address, user_agent, created_at) VALUES (:first_name, :last_name, :email, :subject, :message, :ip_address, :user_agent, :created_at)');
            return $stmt->execute([
                ':first_name' => (string) ($payload['first_name'] ?? ''),
                ':last_name' => (string) ($payload['last_name'] ?? ''),
                ':email' => (string) ($payload['email'] ?? ''),
                ':subject' => (string) ($payload['subject'] ?? ''),
                ':message' => (string) ($payload['message'] ?? ''),
                ':ip_address' => (string) ($_SERVER['REMOTE_ADDR'] ?? 'unknown'),
                ':user_agent' => substr((string) ($_SERVER['HTTP_USER_AGENT'] ?? ''), 0, 255),
                ':created_at' => date('Y-m-d H:i:s'),
            ]);
        } catch (Throwable) {
            return false;
        }
    }
}

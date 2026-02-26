CREATE TABLE IF NOT EXISTS contact_messages (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    first_name VARCHAR(80) NOT NULL,
    last_name VARCHAR(80) NOT NULL,
    email VARCHAR(190) NOT NULL,
    subject VARCHAR(160) NOT NULL,
    message TEXT NOT NULL,
    ip_address VARCHAR(64) NOT NULL,
    user_agent VARCHAR(255) NOT NULL,
    created_at DATETIME NOT NULL
);

CREATE INDEX IF NOT EXISTS idx_contact_messages_created_at ON contact_messages (created_at);
CREATE INDEX IF NOT EXISTS idx_contact_messages_email ON contact_messages (email);

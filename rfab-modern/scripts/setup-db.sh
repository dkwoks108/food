#!/usr/bin/env bash
set -euo pipefail

ROOT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
DB_PATH="${RFAB_DB_SQLITE_PATH:-$ROOT_DIR/storage/database/app.sqlite}"
SCHEMA_PATH="$ROOT_DIR/storage/database/schema.sql"

mkdir -p "$(dirname "$DB_PATH")"

if command -v sqlite3 >/dev/null 2>&1; then
  sqlite3 "$DB_PATH" < "$SCHEMA_PATH"
  echo "Database initialized at: $DB_PATH"
else
  echo "sqlite3 is not installed. Please install sqlite3 or run the SQL manually: $SCHEMA_PATH"
  exit 1
fi

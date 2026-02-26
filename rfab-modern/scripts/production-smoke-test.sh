#!/usr/bin/env bash
set -euo pipefail

if [[ $# -lt 1 ]]; then
  cat <<'USAGE'
Usage:
  ./scripts/production-smoke-test.sh <base-url> [video-path]

Examples:
  ./scripts/production-smoke-test.sh https://rfab.in /assets/video/Flow_delpmaspu222_1080p.mp4
  ./scripts/production-smoke-test.sh https://example.com
USAGE
  exit 1
fi

BASE_URL="${1%/}"
VIDEO_PATH="${2:-/assets/video/Flow_delpmaspu222_1080p.mp4}"

ROUTES=(
  "/"
  "/brands"
  "/chefs"
  "/products"
  "/reviews"
  "/contact"
  "/new-launch/khoobi-water"
)

fail_count=0
pass_count=0

pass() {
  echo "✅ $1"
  pass_count=$((pass_count + 1))
}

fail() {
  echo "❌ $1"
  fail_count=$((fail_count + 1))
}

check_status() {
  local path="$1"
  local code
  code="$(curl -sS -o /dev/null -w "%{http_code}" "$BASE_URL$path")"
  if [[ "$code" == "200" ]]; then
    pass "Route $path returned 200"
  else
    fail "Route $path returned $code (expected 200)"
  fi
}

echo "Running production smoke test against: $BASE_URL"
echo "Video path: $VIDEO_PATH"
echo

for route in "${ROUTES[@]}"; do
  check_status "$route"
done

echo
video_headers="$(curl -sSI "$BASE_URL$VIDEO_PATH")"
content_type="$(printf '%s\n' "$video_headers" | awk -F': ' 'BEGIN{IGNORECASE=1} $1=="Content-Type"{print $2}' | tr -d '\r')"
cache_control="$(printf '%s\n' "$video_headers" | awk -F': ' 'BEGIN{IGNORECASE=1} $1=="Cache-Control"{print $2}' | tr -d '\r')"
accept_ranges="$(printf '%s\n' "$video_headers" | awk -F': ' 'BEGIN{IGNORECASE=1} $1=="Accept-Ranges"{print $2}' | tr -d '\r')"
content_encoding="$(printf '%s\n' "$video_headers" | awk -F': ' 'BEGIN{IGNORECASE=1} $1=="Content-Encoding"{print $2}' | tr -d '\r')"

if [[ "$content_type" =~ video/mp4 ]]; then
  pass "Video MIME is video/mp4"
else
  fail "Video MIME is '$content_type' (expected video/mp4)"
fi

if [[ "$accept_ranges" =~ [Bb]ytes ]]; then
  pass "Accept-Ranges header includes bytes"
else
  fail "Accept-Ranges header missing/invalid ('$accept_ranges')"
fi

if [[ "$cache_control" =~ max-age= ]]; then
  pass "Cache-Control present: $cache_control"
else
  fail "Cache-Control missing for video"
fi

if [[ -z "$content_encoding" || ! "$content_encoding" =~ [Gg][Zz][Ii][Pp] ]]; then
  pass "Video response is not gzip-compressed"
else
  fail "Video response is gzip-compressed (should be disabled)"
fi

echo
range_headers="$(curl -sSI -H "Range: bytes=0-1023" "$BASE_URL$VIDEO_PATH")"
range_status="$(printf '%s\n' "$range_headers" | head -n1 | tr -d '\r')"
content_range="$(printf '%s\n' "$range_headers" | awk -F': ' 'BEGIN{IGNORECASE=1} $1=="Content-Range"{print $2}' | tr -d '\r')"

if [[ "$range_status" =~ 206 ]]; then
  pass "Range request returned 206 Partial Content"
else
  fail "Range request returned '$range_status' (expected 206)"
fi

if [[ -n "$content_range" ]]; then
  pass "Content-Range present: $content_range"
else
  fail "Content-Range header missing on range response"
fi

echo
http_version="$(curl -sS -o /dev/null -w "%{http_version}" "$BASE_URL/" || true)"
if [[ "$http_version" == "2" ]]; then
  pass "HTTP/2 is enabled"
else
  fail "HTTP/2 not detected (reported protocol version: '$http_version')"
fi

echo
if [[ $fail_count -eq 0 ]]; then
  echo "All checks passed ($pass_count checks)."
  exit 0
fi

echo "Completed with failures: $fail_count failed, $pass_count passed."
exit 2

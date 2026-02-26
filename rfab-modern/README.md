# RFAB Modern (PHP MVC-ish)

Premium, mobile-first reconstruction of Roshani Foods & Beverages website.

## Routes

- `/`
- `/brands`
- `/chefs`
- `/products`
- `/reviews`
- `/contact` (GET + POST)
- `/new-launch/khoobi-water`

## Run locally

```bash
cd rfab-modern
php -S 0.0.0.0:8080 -t public
```

Then open `http://localhost:8080`.

## Production smoke test

Run a quick deployment verification for routes, video MIME, byte-range `206`, cache headers, gzip-off for video, and HTTP/2:

```bash
./scripts/production-smoke-test.sh https://your-domain.com /assets/video/Flow_delpmaspu222_1080p.mp4
```

If you omit the second argument, it defaults to `/assets/video/Flow_delpmaspu222_1080p.mp4`.

## Hero video implementation

- Built with `GSAP` + `ScrollTrigger` (no framework assumptions).
- Uses dual MP4 sources selected by viewport (`4K` desktop, `1080p` mobile) before scroll-scrub initialization.
- Initializes only after `loadedmetadata` / `loadeddata` to prevent first-scroll jumps.
- Maps scroll progress to video `currentTime` with GSAP `quickTo(..., { ease: 'none' })` smoothing.
- Applies fallback to poster/static hero when `prefers-reduced-motion` is enabled or device memory/data-saver is constrained.

## Structure

- `public/index.php` front controller
- `app/controllers` route handlers
- `app/models` JSON repositories
- `app/views` layouts/pages/partials
- `app/data` content files
- `app/services` router/view/validation/mail/cache
- `app/middleware` security/rate-limit

## Contact handling

On submit:
- server-side validation via `Validator`
- rate-limit check via `RateLimit`
- CSRF token validation + honeypot bot trap
- stores to database table `contact_messages` when DB is configured
- falls back to `storage/logs/contact-messages.log` if DB is unavailable
- attempts email notification via PHP `mail()`

## Database setup (hosting)

Default configuration uses SQLite for easy hosting deploy.

1) Initialize DB schema:

```bash
cd rfab-modern
bash ./scripts/setup-db.sh
```

2) Optional environment variables:

- `RFAB_DB_DRIVER=sqlite` (default) or `RFAB_DB_DRIVER=mysql`
- `RFAB_DB_SQLITE_PATH=/absolute/path/app.sqlite`
- `RFAB_DB_DSN="mysql:host=127.0.0.1;dbname=rfab;charset=utf8mb4"`
- `RFAB_DB_USER="your_db_user"`
- `RFAB_DB_PASS="your_db_password"`

3) For MySQL hosting, create the table using SQL in `storage/database/schema.sql` (adjust `AUTOINCREMENT` to MySQL `AUTO_INCREMENT` if your panel does not auto-convert).

## Security notes

- Secure session cookie defaults (`HttpOnly`, `SameSite=Lax`, `Secure` on HTTPS)
- Basic hardening headers via middleware
- Contact form CSRF + rate limiting + validation limits
- Mail header sanitization for contact notifications

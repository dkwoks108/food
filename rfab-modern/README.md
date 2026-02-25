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
- logs stored to `storage/logs/contact-messages.log`
- attempts email notification via PHP `mail()`

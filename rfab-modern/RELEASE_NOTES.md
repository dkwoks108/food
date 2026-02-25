# RFAB Modern - Release Notes

## Release
- Date: 2026-02-25
- Commit: 141dc64
- Branch: main

## Delivered
- Rebuilt website scaffold in PHP MVC-ish pattern under [rfab-modern](rfab-modern).
- Implemented front controller + route handling for all required pages.
- Added JSON-driven data architecture for brands, chefs, products, reviews, and site info.
- Implemented shared layouts and reusable partials:
  - Header, footer, SEO meta, newsletter form, WhatsApp floating button.
- Implemented pages:
  - Home, Brands, Chefs, Products, Reviews, Contact, New Launch (Khoobi), 404.
- Added contact form flow with:
  - Server-side validation,
  - Basic rate limiting,
  - Lead logging,
  - Mail notification attempt.

## UI/UX and Motion
- Applied premium dark biryani theme palette and responsive layout.
- Added hero presentation with steam-style visual effect and staged reveal.
- Added scroll reveal animations with reduced-motion support.
- Improved accessibility:
  - Skip-link,
  - focus-visible states,
  - keyboard-friendly mobile navigation behavior.

## Structure Alignment
- Matches requested final structure and route map, including:
  - public assets tree,
  - app config/controllers/models/views/data/services/middleware,
  - scripts and storage directories.
- Added missing placeholder files for strict structure parity:
  - `public/assets/video/hero.mp4`
  - `public/assets/video/kitchen.mp4`
  - `storage/logs/app.log`

## Verification
- PHP syntax lint passed across app/public PHP files.
- Route smoke check passed:
  - `/`, `/brands`, `/chefs`, `/products`, `/reviews`, `/contact`, `/new-launch/khoobi-water` => 200
  - unknown route => 404
- Contact form checks passed:
  - invalid submit => redirect + error flash
  - valid submit => redirect + success flash + log entry

## Business Details Applied
- Brand Name: ROSHANI FOODS AND BEVRAGES
- Phone: 8504040808
- Email: roshanifoodsandbevrages@gmail.com
- Address: 47,49 Inqlaab Appartments, Moti Nagar, Road No 3, Vaishali Nagar, Jaipur 302021

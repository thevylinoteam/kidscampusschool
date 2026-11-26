# Kids Campus School — Bhopal

Source: https://kidscampusbhopal.com/ (public school information).

- Kids Campus, The Foundation School & Day Care
- Main branch: 182-Sarvdharm C-Sector, Opposite Beema Kunj, Kolar Road, Bhopal, Madhya Pradesh 462042.
- Second branch: 50-Good Shepherd Colony, near Croma, Banjari, Kolar Road, Bhopal, Madhya Pradesh 462042.
- Shared contact: +91 94244 42233 / +91 94244 89977; info@kidscampusbhopal.com.
- Published office hours: Monday–Friday, 9:00–14:30.
- Programs: Daycare, Play Group, Nursery, KG-1st, KG 2nd, Primary. Confirm which programs operate at each branch before configuring academic levels.

## Fresh installation (staging first)

This is a customized fork of the upstream V3 development branch, not a verified stable release. Do not upgrade a V2 database in place. Use a new, isolated MySQL 8 database. The original installer must create the administrator and first campus before any additional campus is created.

### Server prerequisites
PHP 8.4.1 or later, Composer 2, Node.js 24/npm, MySQL 8, Redis, writable storage and bootstrap/cache, HTTPS, persistent queue worker and Laravel scheduler. Set the web document root to the application's public/ directory, not the repository root. Do not expose .env, database dumps or backups. Vercel is not a supported target for this full persistent Laravel stack. Sail docker-compose.yml is for local development, not public hosting.

### Prepare a fresh checkout
1. Clone the main branch of https://github.com/thevylinoteam/kidscampusschool and install locked dependencies: `composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader`; run `composer check-platform-reqs --no-dev`.
2. Create .env from .env.example only if it does not exist. Configure APP_ENV=production, APP_DEBUG=false, APP_URL to the actual HTTPS ERP domain, APP_NAME="Kids Campus School", APP_CURRENCY=INR, APP_TIMEZONE=Asia/Kolkata, SESSION_SECURE_COOKIE=true, DEMO_MODE=false and the dedicated database and Redis credentials. Use MAIL_MAILER=log until an approved SMTP account is configured. Keep secrets outside Git. Generate an APP_KEY only on the new installation.
3. Run `npm ci` and `npm run build`; run `php artisan migrate --force`, `php artisan db:seed --class=WorldSeeder --force`, and `php artisan storage:link`. Keep the setup URL access-restricted while the one-time installation is incomplete. Do not run the default or demo database seeder in production.
4. Open the built-in installer. Use the prefilled organization and first campus names and campus email; enter the Main Branch address above, India, Madhya Pradesh, Bhopal, 462042. Select class-based school (home_sections). Choose the owner's authorized administrator email and a unique strong password privately. Leave demo data unchecked on a production installation.
5. After signing in, create Banjari Branch via the application's Schools/organization administration screen, **within the same organization**. Enter the second address, initials KCB, country, state, city, postal code and contact details above. Set the timezone of both schools to Asia/Kolkata in their settings. Use the built-in campus creation workflow so the owner's membership and operating profile are initialized. The earlier KidsCampusSeeder was removed because running it before the installer prevents a fresh installation and running it afterward risks duplicate organizations.
6. Complete each school's setup checklist, academic levels, financial periods, roles, fee schedules and payment channels. Do not assume fee amounts or the availability of every program at every branch.
7. Run a supervised persistent `php artisan queue:work --tries=3` and schedule `php artisan schedule:run` every minute. Configure encrypted off-site backups, keep the backup key separate from the storage, and test recovery.
8. After configuring the environment, run `php artisan config:cache`, `php artisan route:cache`, and `php artisan view:cache`. Verify login, branch membership, unauthorized cross-branch invoice and receipt access, admission, fee receipt printing, fee reversals, scheduler and backup restoration in staging. Check PHP/Node builds, CI tests and dependency audits before processing real child data.

No student records, fee rates, default passwords or tax classifications are supplied. Actual school policy, payment channels, statutory compliance and hosting capability require confirmation before go-live.

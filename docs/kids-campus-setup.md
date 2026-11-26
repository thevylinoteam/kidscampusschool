# Kids Campus School — Bhopal

Source: https://kidscampusbhopal.com/ (public school information).

- Kids Campus, The Foundation School & Day Care
- Main branch: 182-Sarvdharm C-Sector, Opposite Beema Kunj, Kolar Road, Bhopal, Madhya Pradesh 462042.
- Second branch: 50-Good Shepherd Colony, near Croma, Banjari, Kolar Road, Bhopal, Madhya Pradesh 462042.
- Shared contact: +91 94244 42233 / +91 94244 89977; info@kidscampusbhopal.com.
- Published office hours: Monday–Friday, 9:00–14:30.
- Programs: Daycare, Play Group, Nursery, KG-1st, KG 2nd, Primary. Confirm which programs operate at each branch before configuring academic levels.

## Installation
After migrations and core production seeders, run `php artisan db:seed --class=KidsCampusSeeder` explicitly on the intended installation. This creates missing organization and campus records; it does not update existing records or grant access. Do not run the generic demo seeder on production. Configure authorized user memberships, academic levels and actual fee schedules through the application. No fees, student records, credentials or tax classifications are supplied by this customization. Set APP_NAME, APP_CURRENCY=INR, APP_TIMEZONE=Asia/Kolkata, LOGO_PATH and FAVICON_PATH in the deployed environment; clear cached config and build assets. Verify branch isolation and billing before entering real child data.

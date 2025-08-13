# SPINTAS - Satu Pintu Informasi dan Konsultasi (Scaffold)
This is a starter scaffold with recommended files for the SPINTAS Laravel project.
**This is a scaffold only** — run `composer create-project laravel/laravel spintas` first,
then copy these files into the created project and run migrations & seeders.

## Quick setup (recommended)
1. Install Laravel: `composer create-project laravel/laravel spintas`
2. Copy files from this scaffold into the project root (merge with existing folders).
3. Create SQLite file: `touch database/database.sqlite` and set DB_CONNECTION=sqlite in .env
4. Run migrations: `php artisan migrate`
5. Seed superadmin: `php artisan db:seed --class=SuperAdminSeeder`
6. Install frontend: `npm install && npm run dev` (Tailwind / Breeze if used)

## What is included
- Migrations for users, bidangs, konsultasis, log_status
- Models: User, Bidang, Konsultasi, LogStatus
- Controllers: KonsultasiController, SuperAdminController, AdminBidangController, ImpersonateController
- Middleware: RoleMiddleware
- Routes: routes/web.php (basic)
- Views: Blade templates (public form, superadmin and admin dashboard)
- Seeder: SuperAdminSeeder
- .env.example (basic)

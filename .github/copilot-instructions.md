## Quick context for AI coding agents

This repository is Bagisto (a modular Laravel eCommerce project). Key facts an agent must know up-front:

- It's a Laravel 11 application with many first-class, local packages under `packages/Webkul/*` (see `composer.json` PSR-4 autoload). These packages are treated as separate modules and are loaded via a path repository (composer `repositories` with `packages/*/*` and `symlink: true`).
- Many important behaviors, routes, views and migrations live inside `packages/Webkul/*/src` rather than `app/`.
- Frontend assets use Vite (see `package.json`) with sources in `resources/js`, `resources/css` and `resources/themes` and built output under `public/build`.

## What success looks like (contract)

- Inputs: small, focused code change request and the relevant package name (e.g. `Webkul\Shop`).
- Outputs: a targeted change in the right package folder, updates to autoload/composer or assets where needed, and a short test or verification step (artisan command, vite build, or PHPUnit/Pest test). 
- Error modes: missing migrations, broken autoload, or missing npm build — indicate explicit commands to run and files to inspect.

## High-value places to read before editing

- `composer.json` — shows PSR-4 mappings and local path repo (`packages/*/*`).
- `packages/Webkul/*/src` — package source folders (controllers, routes, resources, migrations).
- `phpunit.xml` — configured suites for package tests (Admin, Core, DataGrid, Shop). Use suite names when running tests.
- `resources/themes`, `packages/Webkul/Theme` — theme-related view overrides and public assets.
- `routes/` and `app/Http/Providers` — app-level integration points.

## Developer workflows and concrete commands

- Install dependencies: `composer install` then `composer dump-autoload`.
- If working on packages in `packages/*/*`, the `composer.json` path repository uses symlinks; run `composer install` to register them, then `php artisan package:discover` (this is run automatically by Composer scripts).
- Environment: copy `.env.example` to `.env` (composer post-create-project does this when creating project). Generate key: `php artisan key:generate`.
- Database + seeds for dev: `php artisan migrate --seed` (note: packages may ship their own migrations in `packages/*/src/Database/Migrations`).
- Frontend: `npm install` then `npm run dev` for local Vite dev server, `npm run build` for production assets.
- Local server: `php artisan serve` or use your existing webserver (this repo was developed to run under standard PHP/Apache; public/ is the document root).
- Tests: run Pest or PHPUnit for the configured suites: `./vendor/bin/pest` or `./vendor/bin/phpunit --testsuite "Shop Feature Test"` (suite names come from `phpunit.xml`).

## Patterns and conventions you must follow

- Modular code: add controllers, routes and views inside the respective `packages/Webkul/<Package>/src` folder. Avoid scattering package code into `app/`.
- Autoload: if you add a new namespace/folder, update `composer.json` or place it under an existing PSR-4 mapping; run `composer dump-autoload`.
- Database and migrations: package migrations typically live inside the package; do not create cross-package migrations unless necessary. Use the package's migration folder.
- Tests: package-level tests live under `packages/Webkul/*/tests`. When modifying package behavior, add/update tests in that package's tests directory and run the suite defined in `phpunit.xml`.

## Integration points and dependencies to be careful with

- Elasticsearch: configured via `composer.json` (elasticsearch/elasticsearch). Changes that affect indexing/search should consider packages that bootstrap ES clients.
- OpenAI: `openai-php/laravel` present — any AI-related features will use Laravel service integration and ENV keys in `.env` (check `config/openai.php`).
- Payment & external services: PayPal, Pusher, Predis, Octane. Keep configuration changes in `config/*` and respect environment-driven settings.

## Debugging and common fixes

- Missing classes: run `composer dump-autoload` and re-run `php artisan package:discover`.
- Asset issues: run `npm run dev` (for hot reload) or `npm run build` and clear view cache (`php artisan view:clear`).
- Test environment: `phpunit.xml` sets up many environment variables (cache=array, session=array) — use that for fast tests.

## Examples (where to change for common tasks)

- Add an API route for shop: edit/create `packages/Webkul/Shop/src/Http/routes.php` or `Routes` file within that package.
- Change an admin view: edit `packages/Webkul/Admin/src/Resources/views/...` or override in `resources/themes/<theme>/views`.
- Add a migration to a package: `packages/Webkul/<Package>/src/Database/Migrations/2025_..._create_xxx_table.php` and run `php artisan migrate`.

## When to ask the human maintainer

- If a change touches cross-package contracts (shared services in `packages/Webkul/Core`), ask for design/approval.
- If a change requires infrastructure (ElasticSearch, Octane, external API keys) that you cannot mock locally.

---
If you'd like, I can merge this into an existing `.github/copilot-instructions.md` (none was found) or expand any section (tests, package dev, or example PR checklist). What part should I expand next?

# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

This is a Laravel 12.0 web application with Vite frontend tooling, using TailwindCSS v4.0 and Pest for testing. The project follows standard Laravel directory structure with PHP 8.2+ requirements.

## Common Development Commands

### Development Server
```bash
# Start development server with queue listener and Vite
composer dev

# Individual services
php artisan serve    # Laravel server only
npm run dev         # Vite development server only
```

### Testing
```bash
composer test       # Run all tests (clears config first)
php artisan test    # Run tests directly
```

### Code Quality
```bash
vendor/bin/pint     # Laravel Pint code formatter
```

### Build & Assets
```bash
npm run build       # Build production assets
```

### Artisan Commands
```bash
php artisan         # List all available commands
```

## Architecture

- **Backend**: Laravel 12.0 with PHP 8.2+
- **Frontend**: Vite with TailwindCSS v4.0
- **Testing**: Pest framework (pestphp/pest)
- **Database**: SQLite for testing, configurable for production
- **Queue**: Includes queue worker in development setup

### Key Directories
- `app/` - Laravel application code (Models, Controllers, Providers)
- `resources/js/` - JavaScript assets (app.js, bootstrap.js)
- `resources/css/` - Stylesheets (app.css with TailwindCSS)
- `resources/views/` - Blade templates
- `routes/` - Route definitions (web.php, console.php)
- `tests/` - Pest test suites (Feature and Unit)

### Frontend Asset Pipeline
Vite configuration handles:
- TailwindCSS v4.0 compilation
- JavaScript bundling
- Hot module replacement in development
- Asset versioning for production
# Laravel Access Logs

[![Latest Version on Packagist](https://img.shields.io/packagist/v/jaleeldgk/laravel-access-logs.svg)](https://packagist.org/packages/jaleeldgk/laravel-access-logs)
[![Total Downloads](https://img.shields.io/packagist/dt/jaleeldgk/laravel-access-logs.svg)](https://packagist.org/packages/jaleeldgk/laravel-access-logs)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

A Laravel package for logging user requests and activities. Captures URLs, request parameters, IP addresses, user agents, response statuses, and more — ideal for debugging and auditing.

## Table of Contents

- [Installation](#installation)
- [Configuration](#configuration)
- [Usage](#usage)
  - [Manual Logging](#manual-logging)
  - [Automatic Logging via Middleware](#automatic-logging-via-middleware)
- [Testing](#testing)
- [Author](#author)
- [License](#license)

## Installation

Install the package via Composer:

```bash
composer require jaleeldgk/laravel-access-logs
```

Publish the config file and run the migration:

```bash
php artisan vendor:publish --provider="Jaleeldgk\LaravelAccessLogs\LaravelAccessLogsServiceProvider" --tag="config"
php artisan migrate
```

## Configuration

After publishing, the config file is located at `config/laravel-access-logs.php`. You can toggle which fields are logged:

```php
return [
    'log_user_id'       => true,   // Log the authenticated user ID
    'log_ip'            => true,   // Log the client IP address
    'log_user_agent'    => true,   // Log the User-Agent header
    'log_params'        => true,   // Log request parameters (JSON)
    'log_error_message' => true,   // Log error messages
    'log_error_trace'   => true,   // Log error stack traces
    'log_referral'      => true,   // Log the Referer header
    'log_feedback'      => true,   // Log custom feedback
];
```

## Usage

### Manual Logging

You can manually create a log entry from anywhere in your application:

```php
use Jaleeldgk\LaravelAccessLogs\Helpers\LogHelper;

// Log with default request data
LogHelper::createLog();

// Log with additional custom data
LogHelper::createLog([
    'error_message' => 'Something went wrong',
    'feedback'      => 'User reported issue',
]);
```

### Automatic Logging via Middleware

Register the middleware in your route middleware or globally in `app/Http/Kernel.php`:

```php
protected $routeMiddleware = [
    'access.log' => \Jaleeldgk\LaravelAccessLogs\Middleware\AccessLogMiddleware::class,
];
```

Then apply it to your routes or route groups:

```php
Route::middleware(['access.log'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
});
```

> **Note:** The middleware captures the authenticated user and response status, but you still need to call `LogHelper::createLog()` where appropriate (e.g., in exception handlers or after-response callbacks).

## Testing

Run the test suite with PHPUnit:

```bash
./vendor/bin/phpunit
```

## Author

**Jaleel Ahmad**
- Email: jaleel.ds20@gmail.com
- GitHub: [github.com/jaleeldgk](https://github.com/jaleeldgk)

## License

This package is open-sourced software licensed under the [MIT license](LICENSE).

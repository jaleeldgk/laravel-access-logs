# Laravel Access Logs

A Laravel package for logging user activities and errors.

## Installation

Install via composer:

```bash
composer require jaleeldgk/laravel-access-logs
```

### Publishing files

Install via composer:

```bash
php artisan vendor:publish --provider="Jaleeldgk\LaravelAccessLogs\LaravelAccessLogsServiceProvider" --tag="config"
php artisan migrate
```

### Usage

You can log user activity by calling the LogHelper::createLog() method from anywhere in your application:

```code
use Jaleeldgk\LaravelAccessLogs\Helpers\LogHelper;
LogHelper::createLog()
```

### Configuration

You can customize the logging behavior by editing the config/laravel-access-logs.php file:

```code
return [
    'log_user_id' => true,
    'log_ip' => true,
    'log_user_agent' => true,
    'log_params' => true,
    'log_error_message' => true,
    'log_error_trace' => true,
    'log_referral' => true,
    'log_feedback' => true,
];
```

### Author
Jaleel Ahmad
Email: jaleel.ds20@gmail.com
GitHub: github.com/jaleeldgk

### License
This package is open-sourced software licensed under the MIT license.

### Test the Package

Ensure that the package is working correctly by running the tests:

```bash
./vendor/bin/phpunit
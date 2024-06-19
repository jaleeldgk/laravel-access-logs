<?php

namespace JaleelDgk\UserAccessLogger;

use Illuminate\Support\ServiceProvider;

class UserAccessLoggerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        // Publish configuration
        $this->publishes([
            __DIR__ . '/../config/user-access-logger.php' => config_path('user-access-logger.php'),
        ], 'config');

        // Load migrations
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }

    /**
     * Register any application services.
     */
    public function register()
    {
        // Merge configuration
        $this->mergeConfigFrom(
            __DIR__ . '/../config/user-access-logger.php', 'user-access-logger'
        );
    }
}

<?php

namespace Jaleeldgk\LaravelAccessLogs;

use Illuminate\Support\ServiceProvider;

class LaravelAccessLogsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        // Publish configuration
        $this->publishes([
            __DIR__ . '/../config/laravel-access-logs.php' => config_path('laravel-access-logs.php'),
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
            __DIR__ . '/../config/laravel-access-logs.php', 'laravel-access-logs'
        );
        // Load helpers
        $this->loadHelpers();
    }

    /**
     * Load the helper file.
     *
     * @return void
     */
    protected function loadHelpers()
    {
        foreach (glob(__DIR__ . '/Helpers/loader.php') as $filename) {
            require_once $filename;
        }
    }
}

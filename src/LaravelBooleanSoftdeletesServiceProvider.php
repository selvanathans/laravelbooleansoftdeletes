<?php

namespace selvanathans\LaravelBooleanSoftdeletes;

use Illuminate\Support\ServiceProvider;

class LaravelBooleanSoftdeletesServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'selvanathans');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'selvanathans');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/laravelbooleansoftdeletes.php', 'laravelbooleansoftdeletes');

        // Register the service the package provides.
        $this->app->singleton('laravelbooleansoftdeletes', function ($app) {
            return new LaravelBooleanSoftdeletes;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['laravelbooleansoftdeletes'];
    }
    
    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/laravelbooleansoftdeletes.php' => config_path('laravelbooleansoftdeletes.php'),
        ], 'laravelbooleansoftdeletes.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/selvanathans'),
        ], 'laravelbooleansoftdeletes.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/selvanathans'),
        ], 'laravelbooleansoftdeletes.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/selvanathans'),
        ], 'laravelbooleansoftdeletes.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}

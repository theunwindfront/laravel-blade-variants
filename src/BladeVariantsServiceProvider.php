<?php

namespace Theunwindfront\BladeVariants;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class BladeVariantsServiceProvider extends ServiceProvider
{
    /**
     * Bootstraps the package services.
     */
    public function boot()
    {
        // Register view namespace pointing to local package views directory
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'blade-variants');

        // Automatically map components to easy tags
        Blade::component('blade-variants::components.btn', 'btn');
        Blade::component('blade-variants::components.badge', 'badge');
        Blade::component('blade-variants::components.card', 'card');

        // Allow publishing elements so users can customize them in resources/views/vendor/blade-variants/
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../resources/views' => resource_path('views/vendor/blade-variants'),
            ], 'blade-variants-views');
        }
    }

    /**
     * Registers application bindings.
     */
    public function register()
    {
        // No additional registrations needed
    }
}

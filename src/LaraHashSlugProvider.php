<?php

namespace Afiqiqmal\LaraHashSlug;

use Illuminate\Support\ServiceProvider;

/**
 * Created by PhpStorm.
 * User: hafiq
 * Date: 22/08/2018
 * Time: 4:05 PM
 */

class LaraHashSlugProvider extends ServiceProvider
{
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/hashslug.php' => config_path('hashslug.php'),
        ], 'config');
    }


    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/hashslug.php', 'hashslug');
        $this->app->singleton(LaraHashSlugObserver::class);
    }
}
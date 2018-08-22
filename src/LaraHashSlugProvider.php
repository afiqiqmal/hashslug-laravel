<?php

namespace Afiqiqmal\LaraHashSlug;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Application as LaravelApplication;

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
        $this->setUpConfig();
    }


    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(LaraHashSlugObserver::class);
    }

    protected function setUpConfig()
    {
        $source = dirname(__DIR__) . '/config/hashslug.php';

        if ($this->app instanceof LaravelApplication) {
            $this->publishes([$source => config_path('hashslug.php')], 'config');
        }

        $this->mergeConfigFrom($source, 'hashslug');
    }
}
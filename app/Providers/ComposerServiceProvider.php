<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
            view()->composer('Front::layouts.banner', 'App\ViewComposers\BannerComposer');
            view()->composer('Front::layouts.footer', 'App\ViewComposers\CompanyComposer');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

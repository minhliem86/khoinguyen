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
            view()->composer(['Front::layouts.footer', 'Front::pages.contact'], 'App\ViewComposers\CompanyComposer');
            view()->composer(['Front::pages.home', 'Front::pages.product'], 'App\ViewComposers\LeftPanelComposer');
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

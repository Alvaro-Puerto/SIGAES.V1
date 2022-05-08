<?php

namespace App\Providers;

use App\View\Components\CarouselIndex;
use App\View\Components\LogoComponent;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Blade::component(LogoComponent::class, 'logo-component');
        Blade::component(CarouselIndex::class, 'carousel-index');
    }
}

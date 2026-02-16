<?php

namespace App\Providers;

use App\Models\Gallery;
use App\Models\Setting;
use App\Models\StoreProduct;
use App\Policies\StoreProductPolicy;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $shareSetting = Setting::first();
        $galleries = Gallery::whereStatus(1)->take(6)->get();



        View::share([
            'shareSetting' => $shareSetting,
            'galleries' => $galleries,
        ]);
//        Gate::policy(StoreProduct::class, StoreProductPolicy::class);
        Paginator::useBootstrap();
    }
}

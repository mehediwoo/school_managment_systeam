<?php

namespace App\Providers;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Request;

use App\Models\MetaSet;
use App\Models\BackendSettings;

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
        Paginator::useBootstrap();

        $setting     = BackendSettings::first();
        $seo         = MetaSet::first();
        $current_url = Request::fullUrl();

        View::share([
            'setting'=>$setting,
            'seo'=>$seo,
            'current_url'=>$current_url,
        ]);


    }
}

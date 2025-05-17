<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
use App\Models\Language;
use App\Models\Setting;

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
        //هذا لجعل $languages متاح في كل الـ Blade تلقائيًا.
        view()->share('languages', Language::where('active', true)->get());
        App::setLocale(session('locale', config('app.locale')));
        \View::composer('*', function ($view) {
            $view->with('settings', Setting::pluck('content', 'name')->toArray());
        });
    }
}

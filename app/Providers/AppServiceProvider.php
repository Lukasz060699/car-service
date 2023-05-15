<?php

namespace App\Providers;

use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
        view()->composer('*', function ($view) {
            $user = Auth::user();
            if ($user) {
                $wizyty = $user->visits->whereNotNull('status')->where('accept', 0);
                $visit_count = $wizyty->count();
            $view->with('visit_count', $visit_count);
            }
        });
    }
}

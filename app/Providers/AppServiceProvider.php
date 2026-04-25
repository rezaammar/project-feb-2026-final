<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Image;
use Illuminate\Pagination\Paginator;

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
        // View::composer('*', function ($view) {
        // $notifCount = Image::where('custom', true)->count();
        // $view->with('notifCount', $notifCount);
        // });
        View::composer('*', function ($view) {

            $user = auth()->user();

            if ($user) {
                $notifCount = Image::where('custom', true)
                    ->whereDoesntHave('readers', function ($q) use ($user) {
                        $q->where('user_id', $user->id);
                    })
                    ->count();
            } else {
                $notifCount = 0;
            }

            $view->with('notifCount', $notifCount);
        });

        Paginator::useBootstrap();
    }
}

<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Tasks;
use App\Observers\UserObserver;
use App\Observers\TasksObserver;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

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
        Paginator::useBootstrap();

        User::observe(UserObserver::class);
        Tasks::observe(TasksObserver::class);

    }
}

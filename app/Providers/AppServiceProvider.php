<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Repositories\User\UserReponsitoryInterface;
use App\Repositories\User\UserReponsitory;
use App\Repositories\Category\CategoryReponsitory;
use App\Repositories\Category\CategoryRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(UserReponsitoryInterface::class, UserReponsitory::class);
        $this->app->singleton(CategoryRepositoryInterface::class, CategoryReponsitory::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
    }
}

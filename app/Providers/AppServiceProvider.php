<?php

namespace App\Providers;

use App\Services\Delete\DeleteService;
use App\Services\Delete\DeleteServiceInterface;
use App\Services\Upload\ImageUploadService;
use App\Services\Upload\ImageUploadServiceInterface;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Repositories\User\UserReponsitoryInterface;
use App\Repositories\User\UserReponsitory;
use App\Repositories\Category\CategoryReponsitory;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Product\ProductRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(UserReponsitoryInterface::class, UserReponsitory::class);
        $this->app->singleton(CategoryRepositoryInterface::class, CategoryReponsitory::class);
        $this->app->singleton(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->singleton(DeleteServiceInterface::class,DeleteService::class);
        $this->app->singleton(ImageUploadServiceInterface::class,ImageUploadService::class);


    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\MainCategory\MainCategoryRepositoryInterface;
use App\Repositories\MainCategory\MainCategoryRepository;



class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(MainCategoryRepositoryInterface::class, MainCategoryRepository::class);

    }
}

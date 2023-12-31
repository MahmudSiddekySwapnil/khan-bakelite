<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use App\Services\ImageDeleteService;
use App\Services\ImageUploadService;
use App\Services\MultipleImageUploadService;

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
        $this->app->bind(ImageDeleteService::class);
        $this->app->bind(ImageUploadService::class);
        $this->app->bind(MultipleImageUploadService::class);

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

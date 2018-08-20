<?php

namespace Horsefly\Providers;

use Horsefly\DesignationModel;
use Horsefly\DepartmentModel;
use Horsefly\Observer\DepartmentObserver;
use Horsefly\Observer\DesignationObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Schema::defaultStringLength(191);
        DesignationModel::Observe(DesignationObserver::class);
        DepartmentModel::Observe(DepartmentObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

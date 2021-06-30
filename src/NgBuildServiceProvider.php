<?php

namespace berthott\NgLaravel;

use berthott\NgLaravel\Services\NgBuildService;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class NgBuildServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'angular');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // bind service
        /* $this->app->bind('berthott\NgLaravel\NgBuildService', function () {
            return new NgBuildService();
        }); */

        // publish config
        $this->publishes([
            __DIR__.'/../config/config.php' => config_path('angular.php'),
        ], 'config');

        // add route
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        });

        // add view
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'angular');
    }
    
    protected function routeConfiguration()
    {
        return [
            'middleware' => config('angular.middleware'),
        ];
    }
}

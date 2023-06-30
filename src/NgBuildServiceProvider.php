<?php

namespace berthott\NgLaravel;

use berthott\NgLaravel\Http\Controllers\NgController;
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
        // add config
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'angular');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // publish config
        $this->publishes([
            __DIR__.'/../config/config.php' => config_path('angular.php'),
        ], 'config');

        // add route
        $this->setUpRoute();

        // add view
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'angular');

        // publish view
        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/angular'),
        ], 'views');
    }

    /**
     * Set up the route.
     */
    protected function setUpRoute()
    {
        $exceptedRoutes = [];
        foreach (config('angular.except_routes') as $route) {
            array_push($exceptedRoutes, "(?!$route)");
        }
        $exceptedRoutes = join($exceptedRoutes);
        
        Route::group($this->routeConfiguration(), function () use ($exceptedRoutes) {
            Route::any('/{any?}', [NgController::class, 'index'])
                ->where('any', "^$exceptedRoutes.*$")
                ->name('index');
        });
    }
    
    protected function routeConfiguration()
    {
        return [
            'middleware' => config('angular.middleware'),
        ];
    }
}

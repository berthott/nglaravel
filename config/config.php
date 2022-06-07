<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Angular Output Path
    |--------------------------------------------------------------------------
    |
    | Determines Angulars path inside the public folder.
    |
    */

    'output' => env('NG_OUTPUT_PATH', 'assets/angular'),

    /*
    |--------------------------------------------------------------------------
    | Excepted Routes
    |--------------------------------------------------------------------------
    |
    | Determines the beginning of routes that should not be forwarded to angular.
    |
    */

    'except_routes' => ['api'],


    /*
    |--------------------------------------------------------------------------
    | Route Middleware Configuration
    |--------------------------------------------------------------------------
    |
    | Configurations for the route.
    |
    */

    'middleware' => ['web'],

];

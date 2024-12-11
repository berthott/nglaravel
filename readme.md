![test workflow](https://github.com/berthott/nglaravel/actions/workflows/test.yml/badge.svg)

# NgLaravel

A helper for Angular + Laravel projects.

Easily use Laravel as your API backend and Angular with its CLI as frontend.
Inspired by [fristys' Blogpost](https://fristys.me/blog/using-angular-cli-with-laravel/).

## Installation

You should set up your [Laravel project](https://laravel.com/docs/8.x/installation#installation-via-composer) first.
Then require the package.
```sh
$ composer require berthott/nglaravel
```

## Set up Angular

Choose a folder within or outside of your Laravel project to install your Angular project to. I recommend using the [Angular CLI](https://angular.io/cli/new) inside `resources/angular`.

In `angular.json` do the following changes:
```json
"architect": {
  "build": {
    // ...
    "options": {
      "outputPath": "../../public/assets/angular",
      "deployUrl": "/assets/angular/",
      // ...
    },
    "configurations": {
      "production": {
        // ...
        "statsJson": true,
        // ...
      },
      "development": {
        "watch": true
      }
    }
  },
}
```
In the `package.json` of the angular project do the following changes:
```json
"start": "ng build --configuration development --prod=false",
"build": "ng build",
```

By default default the package will look for Angulars output in `public/assets/angular`. If you choose to change the output path in `angular.json` please set the `output` property in `config/angular.php` or the `NG_OUTPUT_PATH` in `.env` accordingly.

## How it works

The package will set up a generic web route that will catch anything apart from routes specified in the `except_routes` config, and forward it to a view including Angulars output scripts. In development these are the static files, in production a controller will read `stats.json` to include the correctly hashed files.

## Options

To change the default options use
```sh
$ php artisan vendor:publish --provider="berthott\NgLaravel\NgBuildServiceProvider" --tag="config"
```
* `output`: Determines Angulars path inside the public folder. Defaults to `env('NG_OUTPUT_PATH', 'assets/angular')`.
* `except_routes`: Determines the beginning of routes that should not be forwarded to angular. Defaults to `['api']`.
* `middleware`: Configurations for the route. Defaults to `['web']`.

To change the default view use
```sh
$ php artisan vendor:publish --provider="berthott\NgLaravel\NgBuildServiceProvider" --tag="views"
```

## Compatibility

Tested with Laravel 10.x and Angular 16.

## License

See [License File](license.md). Copyright © 2023 Jan Bladt.
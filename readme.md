# NgLaravel - A helper for Angular + Laravel projects

Easily use Laravel as your API backend and Angular with its CLI as frontend.
Inspried by [fristys' Blogpost](https://fristys.me/blog/using-angular-cli-with-laravel/).

## Installation

You should set up your [Laravel project](https://laravel.com/docs/8.x/installation#installation-via-composer) first.
Then require the package.
```
$ composer require berthott/nglaravel
```

## Set up Angular

Choose a folder within or outside of your Laravel project to install your Angular project to. I recommend using the [Angular CLI](https://angular.io/cli/new) inside `resources/angular`.

In `angular.json` do the following changes:
```
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
```
"start": "ng build --configuration development --prod=false",
"build": "ng build",
```

## How it works

The package will set up a generic web route that will catch anything apart from /api URLs an forward it to a view including Angulars output scripts. In development these are the static files, in production a controller will read stats.json to include the correctly hashed files.

## Options

To change the default options use
```
$ php artisan vendor:publish --provider="berthott/NgLaravel/NgBuildServiceProvider"
```
By default default the package will look for Angulars output in `public/assets/angular`. If you choose to change the output path in `angular.json` please set the `output` property in `config/angular.php` or the `NG_OUTPUT_PATH` in `.env` accordingly.

To add a middleware to the web route use the `middleware` property in `angular.json`.

## Compatibility

Tested with Laravel 8.x and Angular 12.

## License

See [License File](license.md). Copyright © 2021 Jan Bladt.
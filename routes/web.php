<?php

use berthott\NgLaravel\Http\Controllers\NgController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::any('/{any}', [NgController::class, 'index'])
  ->where('any', '^(?!api).*$')
  ->name('index');

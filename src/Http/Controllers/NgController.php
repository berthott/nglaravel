<?php

namespace berthott\NgLaravel\Http\Controllers;

use berthott\NgLaravel\Services\NgBuildService;

class NgController extends Controller
{
    public function index(NgBuildService $ng) {
        return view('angular::index', ['ngAssets' => $ng->assets()]);
    }
}

<?php

namespace berthott\NgLaravel\Http\Controllers;

use berthott\NgLaravel\Services\NgBuildService;

/**
 * Controller to handle the generic route and forward to angular.
 */
class NgController extends Controller
{
    /**
     * Show the angular index file and set the assets.
     */
    public function index(NgBuildService $ng) {
        return view('angular::index', ['ngAssets' => $ng->assets()]);
    }
}

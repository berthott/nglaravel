<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="favicon.ico" />
    <meta name="theme-color" content="#000000" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <base href="/" />

    {{-- This'll load our extracted and hashed CSS assets here --}}
    @if (isset($ngAssets) && count($ngAssets))
        <link rel="stylesheet" href="/{{ config('angular.output') }}/{{ $ngAssets['styles'] }}">
    @else
        <link rel="stylesheet" href="/{{ config('angular.output') }}/styles.css">
    @endif
  </head>
  <body>
    <noscript>You need to enable JavaScript to run this app.</noscript>

    <app-root></app-root>

    {{-- This'll load our hashed assets when in production --}}
    @if (isset($ngAssets) && count($ngAssets))
        <script src="/{{ config('angular.output') }}/{{ $ngAssets['runtime'] }}" defer></script>
        <script src="/{{ config('angular.output') }}/{{ $ngAssets['polyfills'] }}" defer></script>
        <script src="/{{ config('angular.output') }}/{{ $ngAssets['main'] }}" defer></script>
    {{-- This'll load the development assets when in dev mode --}}
    @else
        <script src="/{{ config('angular.output') }}/runtime.js" defer></script>
        <script src="/{{ config('angular.output') }}/polyfills.js" defer></script>
        <script src="/{{ config('angular.output') }}/vendor.js" defer></script>
        <script src="/{{ config('angular.output') }}/main.js" defer></script>
    @endenv
  </body>
</html>
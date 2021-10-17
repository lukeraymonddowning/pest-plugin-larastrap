<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Tests\TestCase;

it('can use Laravel features in higher order')
    ->expect(route('example'))
    ->toEqual(config('app.url').'/example');

it('allows datasets to use Laravel features', function (\Illuminate\Routing\Route $route) {
    expect($route)->toBeInstanceOf(\Illuminate\Routing\Route::class);
})->with('all routes');

dataset('all routes', function () {
    return Route::getRoutes()->getRoutesByName();
});

it ('allows shared datasets to use Laravel features', function (string $provider) {
    expect(class_exists($provider))->toBeTrue();
})->with('laravel providers');

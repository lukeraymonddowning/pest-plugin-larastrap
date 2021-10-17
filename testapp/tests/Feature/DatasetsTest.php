<?php

use Illuminate\Support\Facades\Route;

it('allows datasets to use Laravel features', function (\Illuminate\Routing\Route $route) {
    expect($route)->toBeInstanceOf(\Illuminate\Routing\Route::class);
})->with('all routes');

dataset('all routes', function () {
    return Route::getRoutes()->getRoutesByName();
});

it ('allows shared datasets to use Laravel features', function (string $provider) {
    expect(class_exists($provider))->toBeTrue();
})->with('laravel providers');

# Pest Larastrap Plugin

> This is currently a highly experimental project and is subject to large pre-release changes.  

[Pest PHP](https://pestphp.com) is an awesome PHP testing framework. It already has amazing support for Laravel via the [Laravel plugin](https://pestphp.com/docs/plugins/laravel)!
Occasionally however, you'll come across some quirks when working with Pest and Laravel due to the fact that Laravel hasn't been booted during the Pest compile stage. 
Take a look at the following example, using [Higher Order Tests](https://pestphp.com/docs/higher-order-tests):

```php
it('points to the correct URL')
    ->expect(route('dashboard'))
    ->toBe(config('app.url').'/dashboard');
```

If you try to run this out of the box, it will fail; we're trying to make use of Laravel's `route` and `config` helpers, but they require the Laravel application to be booted.

Enter Larastrap. After installing this plugin, the above test will run without issue, and you can carry on testing without any headaches!

## Installation

You can install Larastrap via composer:

```bash
composer require --dev lukeraymonddowning/pest-plugin-larastrap
```

It will be automatically registered, so you can start using it right away!

## Prerequisites

The only prerequisite for using Larastrap is having a `CreatesApplication` trait in your application's `tests` folder. You almost certainly already have this,
as it ships out of the box with Laravel. This trait should have a `createApplication` method inside it. If you don't know what we're talking about, it likely means
everything is good to go and you can skip this section.

## Common use cases

We've already highlighted that Larastrap is super useful in higher order tests. 

```php
it('can access the dashboard')
    ->get(route('dashboard'))
    ->assertOk();
```

Somewhere else it comes in handy is datasets. Traditionally, you wouldn't be able to make use of Laravel in your
datasets. With Larastrap, however, you have the full power of Laravel at your fingertips. For example, perhaps you 
want to check that all service providers are present in your `app.php` config file:

```php
dataset('laravel service providers', function () {
    yield from config('app.providers');
});
```

Now, we have access to a dynamically updated array of provider strings that we can make use of in any test.

Perhaps we want a dataset of the middleware registered on a certain route:

```php
dataset('admin panel middleware', function () {
    return Route::gatherRouteMiddleware(Route::getRoutes()->getByName('admin.dashboard')));
});
```

You can see how powerful this concept is; it opens up the possibility of completely dynamic datasets that grow with your application automatically.

## Caveats

There are a few caveats and limitations you should be aware of when using Larastrap:

### You shouldn't use the database outside of the test

Because Larastrap is basically booting its own laravel instance prior to any of your tests running, the database will be reset before your test is run.
As such, you should still perform database queries inside each test.


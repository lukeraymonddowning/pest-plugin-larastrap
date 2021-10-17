<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Tests\TestCase;

it('can use Laravel features in higher order')
    ->expect(route('example'))
    ->toEqual(config('app.url').'/example');

it('can be mixed with other methods')
    ->get(route('example'))
    ->assertOk();

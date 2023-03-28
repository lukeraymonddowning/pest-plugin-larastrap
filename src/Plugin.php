<?php

declare(strict_types=1);

namespace Lukeraymonddowning\Larastrap;

use Pest\Contracts\Plugins\HandlesArguments;
use Tests\CreatesApplication;

/**
 * @internal
 */
final class Plugin implements HandlesArguments
{
    public function handleArguments(array $arguments): array
    {
        if (!trait_exists(CreatesApplication::class)) {
            throw new \BadMethodCallException('You must have a Tests\\CreatesApplication trait available in your Laravel project to use the Larastrap plugin.');
        }

        (new class() {
            use CreatesApplication;
        })->createApplication();

        return $arguments;
    }
}

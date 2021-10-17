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
        (new class {
            use CreatesApplication;
        })->createApplication();

        return $arguments;
    }
}

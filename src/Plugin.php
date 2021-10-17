<?php

declare(strict_types=1);

namespace Lukeraymonddowning\Larastrap;

use Pest\Contracts\Plugins\HandlesArguments;

/**
 * @internal
 */
final class Plugin implements HandlesArguments
{
    public function handleArguments(array $arguments): array
    {
        dd('here');
//        (new Bootstrapper())->createApplication();
    }
}

<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf Component.
 */

namespace HyperfComponent\Auth;

use Hyperf\Context\Context;

trait ContextHelpers
{
    public function setContext(string $id, $value)
    {
        Context::set(static::class . '.' . $id, $value);
        return $value;
    }

    public function getContext(string $id, $default = null, $coroutineId = null)
    {
        return Context::get(static::class . '.' . $id, $default, $coroutineId);
    }
}

<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf Component.
 */

namespace HyperfComponent\Auth\Contracts\Access;

interface Authorizable
{
    /**
     * Determine if the entity has a given ability.
     *
     * @param array|mixed $arguments
     */
    public function can(string $ability, $arguments = []): bool;
}

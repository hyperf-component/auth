<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf Component.
 */

namespace HyperfComponent\Auth\Contracts;

interface SupportsBasicAuthInterface
{
    /**
     * Attempt to authenticate using HTTP Basic Auth.
     */
    public function basic(string $field = 'email', array $extraConditions = []): void;

    /**
     * Perform a stateless HTTP Basic login attempt.
     */
    public function onceBasic(string $field = 'email', array $extraConditions = []): void;
}

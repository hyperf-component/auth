<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf Component.
 */

namespace HyperfComponent\Auth\Contracts;

interface AuthManagerInterface
{
    /**
     * Get a guard instance by name.
     *
     * @return GuardInterface|StatefulGuardInterface|StatelessGuardInterface
     */
    public function guard(?string $name = null): GuardInterface;

    /**
     * Set the default guard the factory should serve.
     */
    public function shouldUse(string $name): void;
}

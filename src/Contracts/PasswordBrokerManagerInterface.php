<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf Component.
 */

namespace HyperfComponent\Auth\Contracts;

interface PasswordBrokerManagerInterface
{
    /**
     * Get a password broker instance by name.
     *
     * @return mixed
     */
    public function broker(?string $name = null);
}

<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf Component.
 */

namespace HyperfComponent\Auth\Events;

use HyperfComponent\Auth\Contracts\AuthenticatableInterface;

class PasswordReset
{
    /**
     * The user.
     *
     * @var AuthenticatableInterface
     */
    public $user;

    /**
     * Create a new event instance.
     */
    public function __construct(AuthenticatableInterface $user)
    {
        $this->user = $user;
    }
}

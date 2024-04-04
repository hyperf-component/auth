<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf Component.
 */

namespace HyperfComponent\Auth\Events;

use HyperfComponent\Auth\Contracts\AuthenticatableInterface;

class OtherDeviceLogout
{
    /**
     * The authentication guard name.
     *
     * @var string
     */
    public $guard;

    /**
     * The authenticated user.
     *
     * @var AuthenticatableInterface
     */
    public $user;

    /**
     * Create a new event instance.
     */
    public function __construct(string $guard, AuthenticatableInterface $user)
    {
        $this->user = $user;
        $this->guard = $guard;
    }
}

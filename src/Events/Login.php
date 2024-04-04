<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf Component.
 */

namespace HyperfComponent\Auth\Events;

use HyperfComponent\Auth\Contracts\AuthenticatableInterface;

class Login
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
     * Indicates if the user should be "remembered".
     *
     * @var bool
     */
    public $remember;

    /**
     * Create a new event instance.
     */
    public function __construct(string $guard, AuthenticatableInterface $user, bool $remember)
    {
        $this->guard = $guard;
        $this->user = $user;
        $this->remember = $remember;
    }
}

<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf Component.
 */

namespace HyperfComponent\Auth\Events;

use HyperfComponent\Auth\Contracts\AuthenticatableInterface;

class Failed
{
    /**
     * The authentication guard name.
     *
     * @var string
     */
    public $guard;

    /**
     * The user the attempter was trying to authenticate as.
     *
     * @var null|AuthenticatableInterface
     */
    public $user;

    /**
     * The credentials provided by the attempter.
     *
     * @var array
     */
    public $credentials;

    /**
     * Create a new event instance.
     */
    public function __construct(string $guard, ?AuthenticatableInterface $user, array $credentials)
    {
        $this->user = $user;
        $this->guard = $guard;
        $this->credentials = $credentials;
    }
}

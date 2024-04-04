<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf Component.
 */

namespace HyperfComponent\Auth;

use HyperfComponent\Auth\Contracts\AuthenticatableInterface;
use HyperfComponent\Auth\Contracts\UserProviderInterface;
use HyperfComponent\Auth\Exceptions\AuthenticationException;

/**
 * These methods are typically the same across all guards.
 */
trait GuardHelpers
{
    /**
     * The currently authenticated user.
     *
     * @var AuthenticatableInterface
     */
    protected $user;

    /**
     * The user provider implementation.
     *
     * @var UserProviderInterface
     */
    protected $provider;

    /**
     * Determine if current user is authenticated. If not, throw an exception.
     *
     * @throws AuthenticationException
     */
    public function authenticate(): AuthenticatableInterface
    {
        if (! is_null($user = $this->user())) {
            return $user;
        }

        throw new AuthenticationException();
    }

    /**
     * Determine if the guard has a user instance.
     */
    public function hasUser(): bool
    {
        return ! is_null($this->user);
    }

    /**
     * Determine if the current user is authenticated.
     */
    public function check(): bool
    {
        return ! is_null($this->user());
    }

    /**
     * Determine if the current user is a guest.
     */
    public function guest(): bool
    {
        return ! $this->check();
    }

    /**
     * Get the ID for the currently authenticated user.
     *
     * @return null|int|string
     */
    public function id()
    {
        if ($this->user()) {
            return $this->user()->getAuthIdentifier();
        }
        return null;
    }

    /**
     * Set the current user.
     *
     * @return $this
     */
    public function setUser(AuthenticatableInterface $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get the user provider used by the guard.
     */
    public function getProvider(): UserProviderInterface
    {
        return $this->provider;
    }

    /**
     * Set the user provider used by the guard.
     *
     * @return $this
     */
    public function setProvider(UserProviderInterface $provider)
    {
        $this->provider = $provider;

        return $this;
    }
}

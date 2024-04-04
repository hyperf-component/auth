<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf Component.
 */

namespace HyperfComponent\Auth\Contracts;

interface UserProviderInterface
{
    /**
     * Retrieve a user by their unique identifier.
     *
     * @param mixed $identifier
     */
    public function retrieveById($identifier): ?AuthenticatableInterface;

    /**
     * Retrieve a user by their unique identifier and "remember me" token.
     *
     * @param mixed $identifier
     */
    public function retrieveByToken($identifier, string $token): ?AuthenticatableInterface;

    /**
     * Update the "remember me" token for the given user in storage.
     */
    public function updateRememberToken(AuthenticatableInterface $user, string $token): void;

    /**
     * Retrieve a user by the given credentials.
     */
    public function retrieveByCredentials(array $credentials): ?AuthenticatableInterface;

    /**
     * Validate a user against the given credentials.
     */
    public function validateCredentials(AuthenticatableInterface $user, array $credentials): bool;
}

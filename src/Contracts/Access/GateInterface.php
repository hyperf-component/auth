<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf Component.
 */

namespace HyperfComponent\Auth\Contracts\Access;

use HyperfComponent\Auth\Access\Response;
use HyperfComponent\Auth\Contracts\AuthenticatableInterface;
use HyperfComponent\Auth\Exceptions\AuthorizationException;
use InvalidArgumentException;

interface GateInterface
{
    /**
     * Determine if a given ability has been defined.
     *
     * @param string|string[] $ability
     */
    public function has($ability): bool;

    /**
     * Define a new ability.
     *
     * @param callable|string $callback
     *
     * @return $this
     */
    public function define(string $ability, $callback);

    /**
     * Define abilities for a resource.
     *
     * @return $this
     */
    public function resource(string $name, string $class, ?array $abilities = null);

    /**
     * Define a policy class for a given class type.
     *
     * @return $this
     */
    public function policy(string $class, string $policy);

    /**
     * Register a callback to run before all Gate checks.
     *
     * @return $this
     */
    public function before(callable $callback);

    /**
     * Register a callback to run after all Gate checks.
     *
     * @return $this
     */
    public function after(callable $callback);

    /**
     * Determine if the given ability should be granted for the current user.
     *
     * @param array|mixed $arguments
     */
    public function allows(string $ability, $arguments = []): bool;

    /**
     * Determine if the given ability should be denied for the current user.
     *
     * @param array|mixed $arguments
     */
    public function denies(string $ability, $arguments = []): bool;

    /**
     * Determine if all of the given abilities should be granted for the current user.
     *
     * @param iterable|string $abilities
     * @param array|mixed $arguments
     */
    public function check($abilities, $arguments = []): bool;

    /**
     * Determine if any one of the given abilities should be granted for the current user.
     *
     * @param iterable|string $abilities
     * @param array|mixed $arguments
     */
    public function any($abilities, $arguments = []): bool;

    /**
     * Determine if all of the given abilities should be denied for the current user.
     *
     * @param iterable|string $abilities
     * @param array|mixed $arguments
     */
    public function none($abilities, $arguments = []): bool;

    /**
     * Determine if the given ability should be granted for the current user.
     *
     * @param array|mixed $arguments
     *
     * @throws AuthorizationException
     */
    public function authorize(string $ability, $arguments = []): Response;

    /**
     * Inspect the user for the given ability.
     *
     * @param array|mixed $arguments
     */
    public function inspect(string $ability, $arguments = []): Response;

    /**
     * Get the raw result from the authorization callback.
     *
     * @param array|mixed $arguments
     *
     * @return null|bool|Response
     * @throws AuthorizationException
     */
    public function raw(string $ability, $arguments = []);

    /**
     * Get a policy instance for a given class.
     *
     * @param object|string $class
     *
     * @return mixed
     * @throws InvalidArgumentException
     */
    public function getPolicyFor($class);

    /**
     * Get a guard instance for the given user.
     *
     * @return static
     */
    public function forUser(AuthenticatableInterface $user);

    /**
     * Get all of the defined abilities.
     */
    public function abilities(): array;
}

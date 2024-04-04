<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf Component.
 */

namespace HyperfComponent\Auth\Passwords;

use Hyperf\Contract\ConfigInterface;
use HyperfComponent\Auth\Contracts\AuthManagerInterface;
use HyperfComponent\Auth\Contracts\PasswordBrokerInterface;
use HyperfComponent\Auth\Contracts\PasswordBrokerManagerInterface;
use HyperfComponent\Auth\Contracts\TokenRepositoryInterface;
use InvalidArgumentException;
use Psr\Container\ContainerInterface;

use function Hyperf\Support\make;

/**
 * @mixin \HyperfComponent\Auth\Contracts\PasswordBrokerInterface
 * @method string sendResetLink(array $credentials)
 * @method mixed reset(array $credentials, \Closure $callback)
 */
class PasswordBrokerManager implements PasswordBrokerManagerInterface
{
    /**
     * The container instance.
     *
     * @var ContainerInterface
     */
    protected $container;

    /**
     * The config instance.
     *
     * @var ConfigInterface
     */
    protected $config;

    /**
     * The auth manager instance.
     */
    protected AuthManagerInterface $auth;

    /**
     * The array of created "drivers".
     *
     * @var array
     */
    protected $brokers = [];

    /**
     * Create a new PasswordBroker manager instance.
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->auth = $container->get(AuthManagerInterface::class);
        $this->config = $container->get(ConfigInterface::class);
    }

    /**
     * Dynamically call the default driver instance.
     *
     * @return mixed
     */
    public function __call(string $method, array $parameters)
    {
        return $this->broker()->{$method}(...$parameters);
    }

    /**
     * Attempt to get the broker from the local cache.
     */
    public function broker(?string $name = null): PasswordBrokerInterface
    {
        $name = $name ?: $this->getDefaultDriver();

        return $this->brokers[$name] ?? ($this->brokers[$name] = $this->resolve($name));
    }

    /**
     * Get the default password broker name.
     */
    public function getDefaultDriver(): string
    {
        return $this->config->get('auth.default.passwords');
    }

    /**
     * Resolve the given broker.
     *
     * @throws InvalidArgumentException
     */
    protected function resolve(string $name): PasswordBrokerInterface
    {
        $config = $this->getConfig($name);

        if (empty($config)) {
            throw new InvalidArgumentException("Password resetter [{$name}] is not defined.");
        }

        // The password broker uses a token repository to validate tokens and send user
        // password e-mails, as well as validating that password reset process as an
        // aggregate service of sorts providing a convenient interface for resets.
        return new PasswordBroker(
            $this->createTokenRepository($config),
            $this->auth->createUserProvider($config['provider'] ?? null)
        );
    }

    /**
     * Create a token repository instance based on the given configuration.
     */
    protected function createTokenRepository(array $config): TokenRepositoryInterface
    {
        return make($config['driver'], ['options' => $config['options']]);
    }

    /**
     * Get the password broker configuration.
     */
    protected function getConfig(string $name): array
    {
        return $this->config->get("auth.passwords.{$name}");
    }
}
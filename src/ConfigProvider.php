<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf Component.
 */

namespace HyperfComponent\Auth;

use HyperfComponent\Auth\Access\GateManager;
use HyperfComponent\Auth\Contracts\Access\GateManagerInterface;
use HyperfComponent\Auth\Contracts\AuthManagerInterface;
use HyperfComponent\Auth\Contracts\PasswordBrokerManagerInterface;
use HyperfComponent\Auth\Passwords\PasswordBrokerManager;

class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'dependencies' => [
                AuthManagerInterface::class => AuthManager::class,
                GateManagerInterface::class => GateManager::class,
                PasswordBrokerManagerInterface::class => PasswordBrokerManager::class,
            ],
            'annotations' => [
                'scan' => [
                    'paths' => [
                        __DIR__,
                    ],
                    'ignore_annotations' => [
                        'mixin',
                    ],
                ],
            ],
            'publish' => [
                [
                    'id' => 'config',
                    'description' => 'The config for auth.',
                    'source' => __DIR__ . '/../publish/auth.php',
                    'destination' => BASE_PATH . '/config/autoload/auth.php',
                ],
            ],
        ];
    }
}

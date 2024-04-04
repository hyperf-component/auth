<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf Component.
 */

namespace HyperfComponent\Auth\Events;

use HyperfComponent\Auth\Contracts\AuthManagerInterface;

class AuthManagerResolved
{
    /**
     * @var AuthManagerInterface
     */
    public $auth;

    /**
     * Create a new event instance.
     */
    public function __construct(AuthManagerInterface $auth)
    {
        $this->auth = $auth;
    }
}

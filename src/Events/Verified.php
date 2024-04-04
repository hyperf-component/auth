<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf Component.
 */

namespace HyperfComponent\Auth\Events;

use HyperfComponent\Auth\Contracts\MustVerifyEmail;

class Verified
{
    /**
     * The verified user.
     *
     * @var MustVerifyEmail
     */
    public $user;

    /**
     * Create a new event instance.
     */
    public function __construct(MustVerifyEmail $user)
    {
        $this->user = $user;
    }
}

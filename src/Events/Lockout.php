<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf Component.
 */

namespace HyperfComponent\Auth\Events;

use Psr\Http\Message\ServerRequestInterface;

class Lockout
{
    /**
     * The throttled request.
     *
     * @var ServerRequestInterface
     */
    public $request;

    /**
     * Create a new event instance.
     */
    public function __construct(ServerRequestInterface $request)
    {
        $this->request = $request;
    }
}

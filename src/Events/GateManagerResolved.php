<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf Component.
 */

namespace HyperfComponent\Auth\Events;

use HyperfComponent\Auth\Contracts\Access\GateManagerInterface;

class GateManagerResolved
{
    /**
     * @var GateManagerInterface
     */
    public $gate;

    /**
     * Create a new event instance.
     */
    public function __construct(GateManagerInterface $gate)
    {
        $this->gate = $gate;
    }
}

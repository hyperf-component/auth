<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf Component.
 */

namespace HyperfComponent\Auth\Access;

trait HandlesAuthorization
{
    /**
     * Create a new access response.
     *
     * @param null|mixed $code
     */
    protected function allow(?string $message = null, $code = null): Response
    {
        return Response::allow($message, $code);
    }

    /**
     * Throws an unauthorized exception.
     *
     * @param null|mixed $code
     */
    protected function deny(?string $message = null, $code = null): Response
    {
        return Response::deny($message, $code);
    }
}

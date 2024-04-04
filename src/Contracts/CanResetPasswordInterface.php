<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf Component.
 */

namespace HyperfComponent\Auth\Contracts;

interface CanResetPasswordInterface
{
    /**
     * Get the e-mail address where password reset links are sent.
     */
    public function getEmailForPasswordReset(): string;

    /**
     * Send the password reset notification.
     */
    public function sendPasswordResetNotification(string $token): void;
}

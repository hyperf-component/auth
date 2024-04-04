<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf Component.
 */

namespace HyperfComponent\Auth\Aspect;

use Hyperf\Di\Annotation\Aspect;
use Hyperf\Di\Annotation\Inject;
use Hyperf\Di\Aop\AbstractAspect;
use Hyperf\Di\Aop\ProceedingJoinPoint;
use HyperfComponent\Auth\Annotations\Auth;
use HyperfComponent\Auth\Contracts\AuthenticatableInterface;
use HyperfComponent\Auth\Contracts\AuthManagerInterface;
use HyperfComponent\Auth\Exceptions\AuthenticationException;

/**
 * @Aspect
 */
class AuthAspect extends AbstractAspect
{
    public array $annotations = [
        Auth::class,
    ];

    /**
     * @Inject
     * @var AuthManagerInterface
     */
    protected $auth;

    public function process(ProceedingJoinPoint $proceedingJoinPoint)
    {
        $annotation = $proceedingJoinPoint->getAnnotationMetadata();

        $authAnnotation = $annotation->class[Auth::class] ?? $annotation->method[Auth::class];

        $guards = empty($authAnnotation->guards) ? [null] : $authAnnotation->guards;
        $passable = $authAnnotation->passable;

        foreach ($guards as $name) {
            $guard = $this->auth->guard($name);

            if (! $guard->user() instanceof AuthenticatableInterface and ! $passable) {
                throw new AuthenticationException('Unauthenticated.', $guards);
            }
        }

        return $proceedingJoinPoint->process();
    }
}

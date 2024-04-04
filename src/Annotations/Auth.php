<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf Component.
 */

namespace HyperfComponent\Auth\Annotations;

use Hyperf\Di\Annotation\AbstractAnnotation;

/**
 * @Annotation
 * @Target({"CLASS", "METHOD"})
 */
class Auth extends AbstractAnnotation
{
    /**
     * @var string[]
     */
    public $guards;

    /**
     * @var bool
     */
    public $passable;

    public function __construct($value = null)
    {
        // parent::__construct();
        if (isset($value['value'])) {
            $value['value'] = empty($value['value']) ? [] : (is_array($value['value']) ? array_unique($value['value']) : [$value['value']]);
            $this->guards = $value['value'];
        }
        if (isset($value['passable'])) {
            $this->passable = (bool) $value['passable'];
        }
    }
}

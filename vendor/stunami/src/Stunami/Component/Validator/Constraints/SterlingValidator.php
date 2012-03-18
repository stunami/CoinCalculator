<?php

namespace Stunami\Component\Validator\Constraints;

/*
 * This file is part of the Stunami CoinCalculator.
 *
 * (c) Stuart Lowes <stuart.lowes@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Constraint;

/**
 * SterlingValidator - Validates a valid sterling string amount
 */
class SterlingValidator extends ConstraintValidator
{
    public function isValid($value, Constraint $constraint)
    {
        if (false === empty($value) && preg_match($constraint->getRegex(), $value)) {
            return true;
        }

        $this->setMessage($constraint->getMessage());

        return false;
    }
}

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

use \Symfony\Component\Validator\Constraint;

/**
 * Constrain class for a valid Sterling string
 */
class Sterling extends Constraint
{
    private $message = 'The value is not a valid Sterling amount';
    private $regex = '/^[\xa3]?\d+\.?\d*p?$/u';

    public function getMessage()
    {
        return $this->message;
    }

    public function getRegex()
    {
        return $this->regex;
    }

}

<?php

namespace Stunami\Component\Validator\Constraints;

use \Symfony\Component\Validator\Constraint;

/**
 * @Annotation
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

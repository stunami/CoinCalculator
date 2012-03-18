<?php

namespace Stunami\Component\Validator\Constraints;

use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Constraint;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SterlingValidator
 *
 * @author stuart
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

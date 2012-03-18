<?php

namespace Stunami\CoinCalculatorBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

/**
 * Description of CalculateType
 */
class CalculatorType extends AbstractType
{
    /**
     * Set up the form
     *
     * @param FormBuilder $builder
     * @param array $options
     */
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->add('amount');
    }

    /**
     * Returns the name of the form
     *
     * @return string
     */
    public function getName()
    {
        return 'calculator';
    }
}

<?php

namespace Stunami\CoinCalculatorBundle\Entity;

use Stunami\Component\Validator\Constraints as Stunami;

/**
 * Represents a Coin Amount
 *
 * @author stuart
 */
class CoinAmount
{
    /**
     * String amount
     *
     * @var string
     * @Stunami\Sterling
     */
    private $amount;

    /**
     * Returns the amount set
     *
     * @return string
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Sets the amount
     *
     * @param string $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }
}
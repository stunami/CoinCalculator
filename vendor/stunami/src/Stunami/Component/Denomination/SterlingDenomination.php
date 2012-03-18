<?php

namespace Stunami\Component\Denomination;

/*
 * This file is part of the Stunami CoinCalculator.
 *
 * (c) Stuart Lowes <stuart.lowes@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Sterling Denomination
 */
class SterlingDenomination implements DenominationInterface
{
    /**
     *
     * @var type
     */
    private $coins = array(200, 100, 50, 20, 10, 5, 2, 1);

    /**
     * Return the Iterator object
     *
     * @return \ArrayIterator
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->getCoins());
    }

    /**
     * Returns the array of coins
     *
     * @return array Array of coins
     */
    private function getCoins()
    {
        return $this->coins;
    }

}

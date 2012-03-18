<?php

namespace Stunami\Component\Calculator;

/*
 * This file is part of the Stunami CoinCalculator.
 *
 * (c) Stuart Lowes <stuart.lowes@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Calculator Interface responsible for coin calculations
 */
interface CalculatorInterface
{
    public function calculate($amountString);
}

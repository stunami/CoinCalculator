<?php

namespace Stunami\Component\Solver;

/*
 * This file is part of the Stunami CoinCalculator.
 *
 * (c) Stuart Lowes <stuart.lowes@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Stunami\Component\Denomination\DenominationInterface;

/**
 * Very basic greedy Solver
 * Depending on the Denomination, this does not always result in the optimum solution
 */
class GreedySolver implements SolverInterface
{
    /**
     * Returns the coins required to add up to the amount
     *
     * @param  integer               $amount
     * @param  DenominationInterface $denomination
     * @return array                 Array of coins
     */
    public function solve($amount, DenominationInterface $denomination)
    {
        $coins = array();

        // setup array so we return all coins
        foreach($denomination as $coin)
        {
            $coins[$coin] = 0;
        }

        foreach($denomination as $coin)
        {
            if ($amount < 1)
            {
                break;
            }

            $number = floor($amount / $coin);

            $coins[$coin] = $number;
            $amount -= $coin * $coins[$coin];
        }

        return $coins;
    }
}

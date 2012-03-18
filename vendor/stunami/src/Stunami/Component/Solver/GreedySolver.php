<?php

namespace Stunami\Component\Solver;

use Stunami\Component\Denomination\DenominationInterface;

/**
 * Very basic greedy Solver
 * Depending on the Denomination, this does not always result in the optimum solution
 */
class GreedySolver implements SolverInterface
{
    /**
     * Returns the coins required for the amount
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

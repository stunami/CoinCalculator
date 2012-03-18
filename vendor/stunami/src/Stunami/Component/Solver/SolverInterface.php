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
 * Solver Interface
 */
interface SolverInterface
{
    public function solve($amount, DenominationInterface $denomination);
}
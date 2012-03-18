<?php

namespace Stunami\Component\Solver;

use Stunami\Component\Denomination\DenominationInterface;

/**
 *
 * @author stuart
 */
interface SolverInterface
{
    public function solve($amount, DenominationInterface $denomination);
}
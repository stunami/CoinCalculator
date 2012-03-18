<?php

namespace Stunami\Component\Calculator;

use Stunami\Component\Calculator\CalculatorInterface;
use Stunami\Component\Denomination\DenominationInterface;
use Stunami\Component\Solver\SolverInterface;

/**
 * Calculator class
 *
 * Responsible for getting calculating the coins for the amount
 */
class Calculator implements CalculatorInterface
{
    /**
     *
     * @var DenominationInterface The Denomination being used
     */
    private $denomination;

    /**
     *
     * @var SolverInteface The solver implementation being used
     */
    private $solver;

    /**
     *
     * @var ConverterInterface The string converter
     */
    private $converter;

    /**
     *
     * @param DenominationInterface $denomination
     * @param SolverInterface       $solver
     */
    public function __construct(DenominationInterface $denomination, SolverInterface $solver)
    {
        $this->setDenomination($denomination);
        $this->setSolver($solver);
    }

    /**
     * Returns the array of coins calculated to produce the amount
     *
     * @param string $amountString
     * @return array Array of coins
     */
    public function calculate($amountString)
    {
        return $this->getSolver()->solve($amountString, $this->getDenomination());
    }

    /**
     * Returns the instance of DemoninationInterface
     * @return DenominationInterface
     */
    private function getDenomination()
    {
        return $this->denomination;
    }

    /**
     * Sets the Denomination
     *
     * @param DenominationInterface $denomination
     */
    private function setDenomination(DenominationInterface $denomination)
    {
        $this->denomination = $denomination;
    }

    /**
     * Returns the instance of SolverInterface
     *
     * @return SolverInterface
     */
    private function getSolver()
    {
        return $this->solver;
    }

    /**
     * Sets the Solver
     *
     * @param SolverInterface $solver
     */
    public function setSolver(SolverInterface $solver)
    {
        $this->solver = $solver;
    }

}

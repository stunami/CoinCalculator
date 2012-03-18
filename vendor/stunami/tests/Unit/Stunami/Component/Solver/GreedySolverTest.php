<?php

namespace Stunami\Tests\Unit\Component\Solver;

use Stunami\Component\Solver\GreedySolver;
use Stunami\Component\Denomination\SterlingDenomination;
/**
 * Test class for GreedySolver.
 */
class GreedySolverTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GreedySolver
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new GreedySolver;
    }

    /**
     * Data provider from testSolve
     *
     * @return array
     */
    public function solveProvider()
    {
        return array(
            array(0, array(1 => 0, 2 => 0, 5 => 0, 10 => 0, 20 => 0, 50 => 0, 100 => 0, 200 => 0)),
            array(123, array(1 => 1, 2 => 1, 5 => 0, 10 => 0, 20 => 1, 50 => 0, 100 => 1, 200 => 0)),
        );
    }

    /**
     * Test covering solve method
     *
     * @dataProvider solveProvider
     * @covers Stunami\Component\Solver\GreedySolver::solve
     */
    public function testSolve($amount, $expected)
    {
        $this->assertEquals($expected, $this->object->solve($amount, new SterlingDenomination()));
    }

}
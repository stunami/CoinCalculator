<?php

namespace Stunami\Tests\Unit\Component\Calculator;

/*
 * This file is part of the Stunami CoinCalculator.
 *
 * (c) Stuart Lowes <stuart.lowes@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Stunami\Component\Calculator\Calculator;
use Stunami\Component\Denomination\SterlingDenomination;
use Stunami\Component\Solver\GreedySolver;

/**
 * Test class for Calculator.
 */
class CalculatorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Calculator
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $iterator = new \ArrayIterator(array(200, 100, 50, 20, 10, 5, 2, 1));
        $denonination = $this->getMock('Stunami\Component\Denomination\DenominationInterface');
        $denonination->expects($this->any())->method('getIterator')->will($this->returnValue($iterator));

        $solution =  array(1 => 1, 2 => 1, 5 => 1, 10 => 0, 20 => 1, 50 => 0, 100 => 0, 200 => 0);
        $solver = $this->getMock('Stunami\Component\Solver\SolverInterface');
        $solver->expects($this->any())->method('solve')->will($this->returnValue($solution));

        $this->object = new Calculator(new SterlingDenomination(), new GreedySolver());
    }

    /**
     * Test data for testCalculate
     *
     * @return array Array of test data
     */
    public function calculateProvider()
    {
        return array(
            array(28, array(1 => 1, 2 => 1, 5 => 1, 10 => 0, 20 => 1, 50 => 0, 100 => 0, 200 => 0)),
        );
    }

    /**
     * Tests method Calculate
     *
     * @dataProvider calculateProvider
     * @covers Stunami\Component\Calculator\Calculator::calculate
     */
    public function testCalculate($amountString, $expected)
    {
        $this->assertEquals($expected, $this->object->calculate($amountString));
    }

}

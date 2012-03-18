<?php

namespace Stunami\Tests\Unit\Component\Calculator;

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
        // We could use Mocks here but you would end up implementing a lot of the classes
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
            array(123, array(1 => 1, 2 => 1, 5 => 0, 10 => 0, 20 => 1, 50 => 0, 100 => 1, 200 => 0)),
            array(23, array(1 => 1, 2 => 1, 5 => 0, 10 => 0, 20 => 1, 50 => 0, 100 => 0, 200 => 0)),
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

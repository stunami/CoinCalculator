<?php

namespace Stunami\Tests\Unit\Component\Denomination;

/*
 * This file is part of the Stunami CoinCalculator.
 *
 * (c) Stuart Lowes <stuart.lowes@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Stunami\Component\Denomination\SterlingDenomination;

/**
 * Test class for SterlingDenomination.
 */
class SterlingDenominationTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var SterlingDenomination
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new SterlingDenomination;
    }

    /**
     * testGetIterator()
     *
     * @covers Stunami\Component\Denomination\SterlingDenomination::getIterator
     */
    public function testGetIterator()
    {
        $iterator = $this->object->getIterator();
        $this->assertInstanceOf('\ArrayIterator', $iterator);

        $coins = array();
        foreach($iterator as $coin)
        {
            $coins[] = $coin;
        }

        $this->assertEquals(array(200, 100, 50, 20, 10, 5, 2, 1), $coins);
    }

}
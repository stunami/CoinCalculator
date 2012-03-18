<?php

namespace Stunami\Tests\Unit\Component\Validator\Constraints;

/*
 * This file is part of the Stunami CoinCalculator.
 *
 * (c) Stuart Lowes <stuart.lowes@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Stunami\Component\Validator\Constraints\SterlingValidator;
use Stunami\Component\Validator\Constraints\Sterling;

/**
 * Test class for SterlingValidator.
 */
class SterlingValidatorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var SterlingValidator
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new SterlingValidator;
    }

    public function isValidProvider()
    {
        return array(

            // Valid
            array(4, true, 'single digit'),
            array(85, true, 'double digit'),
            array('197p', true, 'pence symbol'),
            array('2p', true, 'pence symbol single digit'),
            array(1.87, true, 'pounds decimal'),
            array('£1.23', true, 'pound symbol'),
            array(2, true, 'single digit pound symbol'),
            array('£10', true, 'double digit pound symbol'),
            array('£1.87', true, 'pound and pence symbol'),
            array('£1p', true, 'missing pence'),
            array('£1.p', true, 'missing pence but present decimal point'),
            array('001.41p', true, 'buffered zeros'),
            array('4.235p', true, 'rounding three decimal places to two'),
            array('£1.257422457p', true, 'rounding with symbols'),

            // Invalid
            array(0, false, 'empty string'),
            array('1x', false, 'non-numeric character'),
            array('£1x.0p', false, 'non-numeric character'),
            array('£p', false, 'missing digits'),

        );
    }

    /**
     * Test covering isValid
     *
     * @dataProvider isValidProvider
     * @covers Stunami\Component\Validator\Constraints\SterlingValidator::isValid
     */
    public function testIsValid($value, $expected, $description)
    {
        $constraint = new Sterling();
        $this->assertEquals($expected, $this->object->isValid($value, $constraint), $description);
    }

}

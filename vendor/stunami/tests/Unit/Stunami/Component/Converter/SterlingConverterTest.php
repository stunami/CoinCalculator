<?php

namespace Stunami\Component\Converter;

use Stunami\Component\Converter\SterlingConverter;

/**
 * Test class for SterlingConverter.
 */
class SterlingConverterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var SterlingConverter
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new SterlingConverter;
    }

    /**
     * Data provider from testToSubunit
     *
     * @return array
     */
    public function toSubunitProvider()
    {
        return array(

            // Valid
            array(4, 4),
            array(85, 85),
            array('197p', 197),
            array('2p', 2),
            array(1.87, 187),
            array('£1.23', 123),
            array('2p', 2),
            array('£10', 1000),
            array('£1.87', 187),
            array('£1p', 100),
            array('£1.p', 100),
            array('001.41p', 141),
            array('4.235p', 424),
            array('£1.257422457p', 126),

            array(0, 0),
            array('1x', null),
            array('£1x.0p', null),
            array('£p', null),

        );
    }

    /**
     * Tests toSubunit
     *
     * @dataProvider toSubunitProvider
     * @covers Stunami\Component\Converter\SterlingConverter::toSubunit
     */
    public function testToSubunit($input, $expected)
    {
        $this->assertEquals($expected, $this->object->toSubunit($input));
    }
}

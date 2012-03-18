<?php

namespace Stunami\Tests\Unit\Component\Validator\Constraints;

use Stunami\Component\Validator\Constraints\Sterling;

/**
 * Test class for Sterling.
 */
class SterlingTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Sterling
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new Sterling;
    }

    /**
     * Test covering getMessage
     *
     * @covers Stunami\Component\Validator\Constraints\Sterling
     */
    public function testGetMessage()
    {
        $this->assertEquals('The value is not a valid Sterling amount', $this->object->getMessage());
    }

    /**
     * Test covering getRegex
     *
     * @covers Stunami\Component\Validator\Constraints\Sterling::getRegex
     */
    public function testGetRegex()
    {
        $this->assertEquals('/^[\xa3]?\d+\.?\d*p?$/u', $this->object->getRegex());
    }

}
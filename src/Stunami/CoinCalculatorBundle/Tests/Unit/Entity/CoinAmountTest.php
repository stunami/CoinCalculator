<?php

namespace Stunami\CoinCalculatorBundle\Tests\Unit\Entity;

use Stunami\CoinCalculatorBundle\Entity\CoinAmount;

use Symfony\Component\Validator\ValidatorFactory;

/**
 * Test class for CoinAmount.
 */
class CoinAmountTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var CoinAmount
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new CoinAmount;
    }

    /**
     * Data provider for testValidation
     *
     * @return array
     */
    public function validationProvider()
    {
        return array(
            array(1.27, 0),
            array(127, 0),
            array('£1.27', 0),
            array('abc', 1),
        );
    }

    /**
     * Tests the object is validated as expected
     *
     * @dataProvider validationProvider
     * @covers Stunami\CoinCalculatorBundle\Entity\CoinAmount
     */
    public function testValidation($amount, $expected)
    {
        $validator = ValidatorFactory::buildDefault()->getValidator();

        $this->object->setAmount($amount);

        $errors = $validator->validate($this->object);

        $this->assertEquals($expected, count($errors));
    }

    /**
     * Test the default amount is null
     *
     * @covers Stunami\CoinCalculatorBundle\Entity\CoinAmount::getAmount
     */
    public function testDefaultAmount()
    {
        $this->assertNull($this->object->getAmount());
    }

    /**
     * Tests the getter and setter for amount
     *
     * @depends testDefaultAmount
     * @covers Stunami\CoinCalculatorBundle\Entity\CoinAmount::getAmount
     * @covers Stunami\CoinCalculatorBundle\Entity\CoinAmount::setAmount
     */
    public function testAmountGetterSetter()
    {
        $amount = 127;

        $this->object->setAmount($amount);
        $this->assertEquals($amount, $this->object->getAmount());
    }

}

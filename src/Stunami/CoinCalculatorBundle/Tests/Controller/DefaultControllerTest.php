<?php

namespace Stunami\CoinCalculatorBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{

    /**
     * @covers Stunami\CoinCalculatorBundle\Controller\DefaultController::indexAction
     */
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $this->assertTrue($crawler->filter('html:contains("Coin Calculator")')->count() > 0);
        $this->assertTrue($crawler->filter('html:contains("Enter the amount below:")')->count() > 0);
    }

    /**
     * Data provider for testCalculate
     *
     * @return array
     */
    public function calculateProvider()
    {
        return array(
            array(123, array('£1' => 1, '20p' => 1, '2p' => 1, '1p' => 1)),
            array(1.23, array('£1' => 1, '20p' => 1, '2p' => 1, '1p' => 1)),
            array('1.23p', array('£1' => 1, '20p' => 1, '2p' => 1, '1p' => 1)),
            array('£1.23', array('£1' => 1, '20p' => 1, '2p' => 1, '1p' => 1)),
            array('£001.234567', array('£1' => 1, '20p' => 1, '2p' => 1, '1p' => 1)),
        );
    }

    /**
     * Tests the calculate method
     *
     * @dataProvider calculateProvider
     * @covers Stunami\CoinCalculatorBundle\Controller\DefaultController::indexAction
     */
    public function testCalculate($amount, array $expected)
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $form = $crawler->selectButton('Enter')->form();

        $form['calculator[amount]'] = $amount;

        $crawler = $client->submit($form);

        $this->assertTrue($crawler->filter('html:contains("Enter the amount below:")')->count() > 0);
        $this->assertTrue($crawler->filter('html:contains("You entered: ' . $amount . '")')->count() > 0, 'entered amount');

        foreach ($expected as $coin => $quantity) {
            $this->assertTrue($crawler->filter('html:contains("' . $coin . ' x ' . $quantity . '")')->count() > 0);
        }
    }

    /**
     * Test we get the expected errors
     *
     * @covers Stunami\CoinCalculatorBundle\Controller\DefaultController::indexAction
     */
    public function testCalculateErrors()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $form = $crawler->selectButton('Enter')->form();

        $form['calculator[amount]'] = 'abc';

        $crawler = $client->submit($form);

        $this->assertTrue($crawler->filter('html:contains("The value is not a valid Sterling amount")')->count() > 0);
    }

}

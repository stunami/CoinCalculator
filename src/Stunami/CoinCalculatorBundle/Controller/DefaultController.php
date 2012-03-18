<?php

namespace Stunami\CoinCalculatorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Stunami\CoinCalculatorBundle\Entity\CoinAmount;
use Stunami\CoinCalculatorBundle\Form\CalculatorType;

use Stunami\Component\Calculator\Calculator;
use Stunami\Component\Denomination\SterlingDenomination;
use Stunami\Component\Solver\GreedySolver;
use Stunami\Component\Converter\SterlingConverter;

class DefaultController extends Controller
{
    /**
     * @Route("", name="coin_calculator")
     * @Template()
     */
    public function indexAction()
    {
        $request = $this->get( 'request' );

        // The object representing the submitted form data
        // The validation is set by annotations in the class
        // see vendor/stunami/CoinCalculator/Validator
        $amount = new CoinAmount();

        // This object is bound to the form
        $form = $this->createForm(new CalculatorType(), $amount);

        $coins = array();

        // When POST we process the form data
        if ($request->getMethod() == 'POST') {

            // bind the form
            $form->bindRequest($request);

            // if we have a valid form
            if ($form->isValid()) {

                // grab the calculator service
                // Resources/config/service
                $calculator = $this->container->get('stunami_coin_calculator.calculator');

                // use the converter service to converts the amount string into sterling pence
                $converter = $this->container->get('stunami_coin_calculator.converter');

                // calculate the
                $coins = $calculator->calculate($converter->toSubunit($amount->getAmount()));
            }
        }

        return $this->render('StunamiCoinCalculatorBundle:Default:index.html.twig', array(
            'form' => $form->createView(),
            'coins' => $coins
        ));
    }
}

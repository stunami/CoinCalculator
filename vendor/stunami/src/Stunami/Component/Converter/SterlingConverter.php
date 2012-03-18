<?php

namespace Stunami\Component\Converter;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Coverts Sterling strings to integer amount (pence)
 */
class SterlingConverter implements ConverterInterface
{
    public function toSubunit($amountString)
    {
        preg_match('/^([\xa3])?(\d+\.?\d*)(p)?$/u', $amountString, $units);

        /*
          [0]=>
          string(1) "4"
          [1]=>
          string(0) "" <- £
          [2]=>
          string(1) "4"
          [3]=>
          string(0) ""
          [4]=>
          string(0) ""
         */
        if (empty($units))
        {
            return null;
        }

        $pence = 0;

        $period = strstr($units[2], '.');

        // period so must be in pound and pence
        // or pound sign
        if (false !== $period || false === empty($units[1])) {
            $pence = round($units[2], 2) * 100;
        }
        else {
            $pence = $units[2];
        }

        return (int)$pence;


    }
}

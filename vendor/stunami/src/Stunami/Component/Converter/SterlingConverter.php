<?php

namespace Stunami\Component\Converter;

/*
 * This file is part of the Stunami CoinCalculator.
 *
 * (c) Stuart Lowes <stuart.lowes@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Coverts Sterling strings to integer amount (pence)
 */
class SterlingConverter implements ConverterInterface
{
    public function toSubunit($amountString)
    {
        preg_match('/^([\xa3])?(\d+\.?\d*)(p)?$/u', $amountString, $units);

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

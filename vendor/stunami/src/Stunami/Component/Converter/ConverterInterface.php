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
 * Converter Interface responsbile for Converter string to subunit (pence, cents etc)
 */
interface ConverterInterface
{
    public function toSubunit($amountString);
}

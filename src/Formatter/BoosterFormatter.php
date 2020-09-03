<?php

/*
 * Copyright (c) Romain Cottard
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace MagicLegacy\Component\MtgJson\Formatter;

use MagicLegacy\Component\MtgJson\Entity\Booster;

/**
 * Class BoosterFormatter
 *
 * @author Romain Cottard
 */
final class BoosterFormatter implements FormatterInterface
{
    /**
     * Format data & return list of value object.
     *
     * @param mixed $data
     * @return Booster
     */
    public function format($data)
    {
        return new Booster($data);
    }
}

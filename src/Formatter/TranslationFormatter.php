<?php

/*
 *  Copyright (c) Romain Cottard
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace MagicLegacy\Component\MtgJson\Formatter;

use MagicLegacy\Component\MtgJson\Entity\Translations;

/**
 * Class TranslationFormatter
 *
 * @author Romain Cottard
 */
final class TranslationFormatter implements FormatterInterface
{
    /**
     * Format data & return list of value object.
     *
     * @param mixed $data
     * @return Translations
     */
    public function format($data)
    {
        return new Translations((array) $data);
    }
}
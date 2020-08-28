<?php

/*
 * Copyright (c) Romain Cottard
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace MagicLegacy\Component\MtgJson\Formatter;

use MagicLegacy\Component\MtgJson\Entity\SetBasic;

/**
 * Class SetListFormatter
 *
 * @author Romain Cottard
 */
final class SetListFormatter implements FormatterInterface
{
    /**
     * Format data & return list of value object.
     *
     * @param mixed $data
     * @return SetBasic[]
     */
    public function format($data)
    {
        $collection = [];
        foreach ($data->data as $setBasic) {
            $collection[] = new SetBasic(
                (int) $setBasic->baseSetSize,
                (int) $setBasic->totalSetSize,
                (string) $setBasic->code,
                (string) $setBasic->name,
                (string) $setBasic->type,
                (string) $setBasic->releaseDate,
                $setBasic->isFoilOnly ?? false,
                $setBasic->isOnlineOnly ?? false,
                $setBasic->isPaperOnly ?? true
            );
        }

        return $collection;
    }
}

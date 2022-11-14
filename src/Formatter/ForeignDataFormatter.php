<?php

/*
 * Copyright (c) Romain Cottard
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace MagicLegacy\Component\MtgJson\Formatter;

use MagicLegacy\Component\MtgJson\Entity\ForeignData;

/**
 * Class ForeignDataFormatter
 *
 * @author Romain Cottard
 */
final class ForeignDataFormatter implements FormatterInterface
{
    /**
     * Format data & return list of value object.
     *
     * @param \stdClass[] $data
     * @return ForeignData[]
     */
    public function format($data): array
    {
        if (empty($data)) {
            return [];
        }

        $collection = [];
        foreach ($data as $foreignDataRaw) {
            $collection[$foreignDataRaw->language] = new ForeignData(
                (string) ($foreignDataRaw->faceName ?? ''),
                (string) $foreignDataRaw->name,
                (string) ($foreignDataRaw->text ?? ''),
                (string) ($foreignDataRaw->flavorText ?? ''),
                (string) $foreignDataRaw->language,
                (int) ($foreignDataRaw->multiverseId ?? 0),
                (string) ($foreignDataRaw->type ?? '')
            );
        }

        return $collection;
    }
}

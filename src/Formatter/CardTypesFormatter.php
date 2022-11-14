<?php

/*
 * Copyright (c) Romain Cottard
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace MagicLegacy\Component\MtgJson\Formatter;

use MagicLegacy\Component\MtgJson\Entity\CardTypes;

/**
 * Class CardTypesFormatter
 *
 * @author Romain Cottard
 */
final class CardTypesFormatter implements FormatterInterface
{
    /**
     * Format data & return list of value object.
     *
     * @param \stdClass $data
     * @return CardTypes
     */
    public function format($data): CardTypes
    {
        $data = $data->data;

        return new CardTypes(
            (new TypesFormatter())->format($data->artifact),
            (new TypesFormatter())->format($data->conspiracy),
            (new TypesFormatter())->format($data->creature),
            (new TypesFormatter())->format($data->enchantment),
            (new TypesFormatter())->format($data->instant),
            (new TypesFormatter())->format($data->land),
            (new TypesFormatter())->format($data->phenomenon),
            (new TypesFormatter())->format($data->plane),
            (new TypesFormatter())->format($data->planeswalker),
            (new TypesFormatter())->format($data->scheme),
            (new TypesFormatter())->format($data->sorcery),
            (new TypesFormatter())->format($data->tribal),
            (new TypesFormatter())->format($data->vanguard)
        );
    }
}

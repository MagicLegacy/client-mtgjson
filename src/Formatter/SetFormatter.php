<?php

/*
 * Copyright (c) Romain Cottard
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace MagicLegacy\Component\MtgJson\Formatter;

use MagicLegacy\Component\MtgJson\Entity\Set;

/**
 * Class SetFormatter
 *
 * @author Romain Cottard
 */
final class SetFormatter implements FormatterInterface
{
    /**
     * Format data & return list of value object.
     *
     * @param mixed $data
     * @return Set
     */
    public function format($data)
    {
        $data = $data->data;

        $booster     = (new BoosterFormatter())->format((object) ($data->booster ?? []));
        $tokens      = (new CardTokenFormatter())->format($data->tokens ?? []);
        $cards       = (new CardFormatter())->format($data->cards ?? []);
        $translation = (new TranslationFormatter())->format((object) ($data->translations ?? []));

        return new Set(
            (int) $data->baseSetSize,
            (int) $data->totalSetSize,
            (string) $data->code,
            (string) $data->name,
            (string) $data->type,
            (string) $data->releaseDate,
            (string) ($data->block ?? null),
            $booster,
            $tokens,
            $cards,
            ($data->codeV3 ?? null),
            (string) $data->keyruneCode,
            ($data->parentCode ?? null),
            $translation,
            (int) ($data->mcmId ?? 0),
            ($data->mcmName ?? null),
            ($data->mtgoCode ?? null),
            (int) ($data->tcgplayerGroupId ?? 0),
            (bool) ($data->isPartialPreview ?? false),
            (bool) ($data->isFoilOnly ?? false),
            (bool) ($data->isNonFoilOnly ?? false),
            (bool) ($data->isOnlineOnly ?? false),
            (bool) ($data->isPaperOnly ?? false),
            (bool) ($data->isForeignOnly ?? false)
        );
    }
}

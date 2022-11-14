<?php

/*
 * Copyright (c) Romain Cottard
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace MagicLegacy\Component\MtgJson\Formatter;

use MagicLegacy\Component\MtgJson\Entity\CardToken;

/**
 * Class TokenFormatter
 *
 * @author Romain Cottard
 */
final class CardTokenFormatter implements FormatterInterface
{
    /**
     * Format data & return list of value object.
     *
     * @param \stdClass[] $data
     * @return CardToken[]
     */
    public function format($data): array
    {
        if (empty($data)) {
            return [];
        }

        $tokens = [];
        foreach ($data as $card) {
            //~ Sub entities
            $identifiers      = (new IdentifiersFormatter())->format($card->identifiers);

            $tokens[] = new CardToken(
                //~ Id
                (string) $card->uuid,
                //~ Names & side
                (string) ($card->side ?? ''),
                (string) ($card->faceName ?? ''), # not optional in doc
                (string) ($card->name ?? ''),
                (string) ($card->asciiName ?? ''),
                //~ Color
                (array) $card->colorIdentity,
                (array) ($card->colorIndicator ?? []), # not optional in doc
                (array) $card->colors,
                //~ Types
                (array) $card->subtypes,
                (array) $card->supertypes,
                (string) $card->type,
                (array) $card->types,
                //~ Card properties
                (string) ($card->text ?? ''),
                (string) ($card->loyalty ?? ''),
                (string) ($card->power ?? ''),
                (string) ($card->toughness ?? ''),
                //~ Layout design
                (string) $card->layout,
                //~ Misc
                (int) ($card->edhrecRank ?? 0),
                //~ Ids
                $identifiers,
                (array) ($card->otherFaceIds ?? []), # not optional in doc
                //~ Set related
                (string) $card->setCode,
                (string) $card->number,
                (string) ($card->artist ?? ''),
                (string) ($card->flavorText ?? ''),
                (string) $card->borderColor,
                (array) ($card->frameEffects ?? []), # not optional in doc
                (string) $card->frameVersion,
                (string) ($card->watermark ?? ''),
                //~ Extended / original properties
                (array)( $card->keywords ?? []),
                (array) $card->availability,
                //~ Foil related
                (bool) $card->hasFoil,
                (bool) $card->hasNonFoil,
                //~ Other boolean misc
                (bool) ($card->isFullArt ?? false),
                (bool) ($card->isOnlineOnly ?? false),
                (bool) ($card->isPromo ?? false),
                (bool) ($card->isReprint ?? false),
                //~ Misc data
                (array) ($card->promoTypes ?? [])
            );
        }

        return $tokens;
    }
}

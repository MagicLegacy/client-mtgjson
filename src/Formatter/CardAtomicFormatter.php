<?php

/*
 * Copyright (c) Romain Cottard
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace MagicLegacy\Component\MtgJson\Formatter;

use MagicLegacy\Component\MtgJson\Entity\CardAtomic;

/**
 * Class CardAtomicFormatter
 *
 * @author Romain Cottard
 */
final class CardAtomicFormatter implements FormatterInterface
{
    /**
     * Format data & return list of value object.
     *
     * @param mixed $data
     * @return CardAtomic[]
     */
    public function format($data)
    {
        $cards = [];
        foreach ($data->data as $card) {
            $card = reset($card); // first element

            //~ Sub entities
            $leadershipSkills = (new LeadershipSkillsFormatter())->format($card->leadershipSkills ?? null);
            $legalities       = (new LegalitiesFormatter())->format($card->legalities ?? null);
            $foreignData      = (new ForeignDataFormatter())->format($card->foreignData ?? []);
            $purchaseUrls     = (new PurchaseUrlsFormatter())->format($card->purchaseUrls ?? (object) []);
            $identifiers      = (new IdentifiersFormatter())->format($card->identifiers ?? (object) []);
            $rulings          = (new RulingsFormatter())->format($card->rulings ?? []);

            //~ Format card data
            $cards[] = new CardAtomic(
                //~ Cost
                (string) ($card->manaCost ?? ''),
                (float) $card->convertedManaCost,
                (float) ($card->faceConvertedManaCost ?? 0.0),
                //~ Names & side
                (string) ($card->side ?? ''),
                (string) ($card->faceName ?? ''),
                (string) ($card->name ?? ''),
                (string) ($card->asciiName ?? ''),
                //~ Color
                (array) $card->colorIdentity,
                (array) ($card->colorIndicator ?? []),
                (array) $card->colors,
                //~ Types
                (array) $card->subtypes,
                (array) $card->supertypes,
                (string) $card->type,
                (array) $card->types,
                //~ Card properties
                (array) ($card->keywords ?? []),
                (string) ($card->text ?? ''),
                (string) ($card->loyalty ?? ''),
                (string) ($card->power ?? ''),
                (string) ($card->toughness ?? ''),
                //~ Modifiers
                (string) ($card->hand ?? ''),
                (string) ($card->life ?? ''),
                (bool) ($card->hasAlternativeDeckLimit ?? false),
                //~ Legalities & commander
                $leadershipSkills,
                $legalities,
                //~ Layout design
                (string) $card->layout,
                //~ Translations
                (array) $foreignData,
                //~ Misc
                (array) ($card->printings ?? []),
                $purchaseUrls,
                (bool) ($card->isReserved ?? false),
                (int) ($card->edhrecRank ?? 0),
                $identifiers,
                $rulings
            );
        }

        return $cards;
    }
}

<?php

/*
 * Copyright (c) Romain Cottard
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace MagicLegacy\Component\MtgJson\Formatter;

use MagicLegacy\Component\MtgJson\Entity\Card;

/**
 * Class CardFormatter
 *
 * @author Romain Cottard
 */
final class CardFormatter implements FormatterInterface
{
    /**
     * Format data & return list of value object.
     *
     * @param mixed $data
     * @return Card[]
     */
    public function format($data)
    {
        $cards = [];
        foreach ($data as $card) {

            //~ Sub entities
            $leadershipSkills = (new LeadershipSkillsFormatter())->format($card->leadershipSkills ?? null);
            $legalities       = (new LegalitiesFormatter())->format($card->legalities ?? null);
            $foreignData      = (new ForeignDataFormatter())->format($card->foreignData);
            $purchaseUrls     = (new PurchaseUrlsFormatter())->format($card->purchaseUrls);
            $identifiers      = (new IdentifiersFormatter())->format($card->identifiers);
            $rulings          = (new RulingsFormatter())->format($card->rulings);

            //~ Format card data
            $cards[] = new Card(
                //~ ATOMIC PROPERTIES
                //~ Id
                (string) $card->uuid,

                //~ Cost
                (string) ($card->manaCost ?? ''),
                (float) ($card->convertedManaCost ?? 0.0),
                (float) ($card->faceConvertedManaCost ?? 0.0),

                //~ Names & side
                (string) ($card->side ?? ''),
                (string) ($card->faceName ?? ''),
                (string) ($card->name ?? ''),
                (string) ($card->asciiName ?? ''),

                //~ Color
                (array) ($card->colorIdentity ?? []),
                (array) ($card->colorIndicator ?? []),
                (array) ($card->colors ?? []),

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


                //~ OTHER CARD PROPERTIES
                //~ Ids
                $identifiers,
                (array) ($card->otherFaceIds ?? []),

                //~ Set related
                (string) $card->setCode,
                (string) $card->number,
                (string) $card->rarity,
                (string) ($card->artist ?? ''),
                (string) ($card->flavorText ?? ''),
                (string) $card->borderColor,
                (array) ($card->frameEffects ?? []),
                (string) $card->frameVersion,
                (string) ($card->watermark ?? ''),
                (array) ($card->variations ?? []),

                //~ Extended / original properties
                (array) ($card->keywords ?? []),
                (string) ($card->originalText ?? ''),
                (string) ($card->originalType ?? ''),
                (array) $rulings,
                (array) $card->availability,

                //~ Foil related
                (bool) $card->hasFoil,
                (bool) $card->hasNonFoil,

                //~ Other boolean misc
                (bool) ($card->isFullArt ?? false),
                (bool) ($card->isOnlineOnly ?? false),
                (bool) ($card->isPromo ?? false),
                (bool) ($card->isReprint ?? false),
                (bool) ($card->isAlternative ?? false),
                (bool) ($card->hasContentWarning ?? false),
                (bool) ($card->isOversized ?? false),
                (bool) ($card->isStarter ?? false),
                (bool) ($card->isStorySpotlight ?? false),
                (bool) ($card->isTextless ?? false),
                (bool) ($card->isTimeshifted ?? false),

                //~ Misc data
                (array) ($card->promoTypes ?? []),
                (int) ($card->count ?? 0),
                (string) ($card->duelDeck ?? ''),
            );
        }

        return $cards;
    }
}

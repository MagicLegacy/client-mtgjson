<?php

/*
 * Copyright (c) Deezer
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace MagicLegacy\Component\MtgJson\Test\Formatter;

use MagicLegacy\Component\MtgJson\Entity\ForeignData;
use MagicLegacy\Component\MtgJson\Entity\Identifiers;
use MagicLegacy\Component\MtgJson\Entity\LeadershipSkills;
use MagicLegacy\Component\MtgJson\Entity\Legalities;
use MagicLegacy\Component\MtgJson\Entity\PurchaseUrls;
use MagicLegacy\Component\MtgJson\Formatter\CardFormatter;
use PHPUnit\Framework\TestCase;
use Safe\Exceptions\JsonException;

use function Safe\json_decode;

/**
 * Class CardFormatterTest
 */
class CardFormatterTest extends TestCase
{
    /**
     * @return void
     * @throws JsonException
     */
    public function testICanGetValuesFromValueObjectAfterFormatting(): void
    {

        $cards    = $this->getResponseObject();
        $entities = (new CardFormatter())->format($cards);

        $entity = reset($entities);
        $data   = reset($cards);

        $this->assertEquals($data->colorIdentity, $entity->getColorIdentity());
        $this->assertEquals([], $entity->getColorIndicator());
        $this->assertEquals($data->colors, $entity->getColors());
        $this->assertEquals($data->convertedManaCost, $entity->getConvertedManaCost());
        $this->assertEquals($data->manaCost, $entity->getManaCost());
        $this->assertEquals($data->name, $entity->getName());

        $this->assertEquals($data->layout, $entity->getLayout());
        $this->assertEquals($data->printings, $entity->getPrintings());
        $this->assertEquals($data->text, $entity->getText());
        $this->assertEquals($data->type, $entity->getType());
        $this->assertEquals($data->types, $entity->getTypes());

        $this->assertIsArray($entity->getAllForeignData());
        $this->assertCount(0, $entity->getAllForeignData());

        $this->assertInstanceOf(Identifiers::class, $entity->getIdentifiers());
        $this->assertInstanceOf(Legalities::class, $entity->getLegalities());
        $this->assertInstanceOf(PurchaseUrls::class, $entity->getPurchaseUrls());

        $leadershipSkills = $entity->getLeadershipSkills();
        $this->assertInstanceOf(LeadershipSkills::class, $entity->getLeadershipSkills());
        $this->assertFalse($leadershipSkills->hasBrawl());
        $this->assertFalse($leadershipSkills->hasCommander());
        $this->assertTrue($leadershipSkills->hasOathbreaker());

        $this->assertIsArray($entity->getRulings());
        $this->assertCount(0, $entity->getRulings());

        $this->assertIsArray($entity->getSubTypes());
        $this->assertCount(1, $entity->getSubTypes());
        $this->assertEquals($data->subtypes, $entity->getSubTypes());

        $this->assertIsArray($entity->getSuperTypes());
        $this->assertCount(1, $entity->getSuperTypes());
        $this->assertEquals($data->supertypes, $entity->getSuperTypes());

        $this->assertNull($entity->getForeignData('French'));

        $this->assertEquals($data->uuid ?? '', $entity->getUuid());
        $this->assertEquals($data->faceConvertedManaCost ?? 0.0, $entity->getFaceConvertedManaCost());
        $this->assertEquals($data->side ?? '', $entity->getSide());
        $this->assertEquals($data->faceName ?? '', $entity->getFaceName());
        $this->assertEquals($data->asciiName ?? '', $entity->getAsciiName());
        $this->assertEquals($data->loyalty ?? '', $entity->getLoyalty());
        $this->assertEquals($data->power ?? '', $entity->getPower());
        $this->assertEquals($data->toughness ?? '', $entity->getToughness());
        $this->assertEquals($data->hand ?? '', $entity->getHand());
        $this->assertEquals($data->life ?? '', $entity->getLife());
        $this->assertEquals($data->hasAlternativeDeckLimit ?? false, $entity->hasAlternativeDeckLimit());
        $this->assertEquals($data->isReserved ?? false, $entity->isReserved());
        $this->assertEquals($data->edhrecRank ?? 0, $entity->getEdhrecRank());
        $this->assertEquals($data->otherFaceIds ?? [], $entity->getOtherFaceIds());
        $this->assertEquals($data->setCode ?? '', $entity->getSetCode());
        $this->assertEquals($data->rarity ?? '', $entity->getRarity());
        $this->assertEquals($data->artist ?? '', $entity->getArtist());
        $this->assertEquals($data->flavorText ?? '', $entity->getFlavorText());
        $this->assertEquals($data->borderColor ?? '', $entity->getBorderColor());
        $this->assertEquals($data->frameEffects ?? [], $entity->getFrameEffects());
        $this->assertEquals($data->frameVersion ?? '', $entity->getFrameVersion());
        $this->assertEquals($data->watermark ?? '', $entity->getWatermark());
        $this->assertEquals($data->variations ?? [], $entity->getVariations());
        $this->assertEquals($data->keywords ?? [], $entity->getKeywords());
        $this->assertEquals($data->originalText ?? '', $entity->getOriginalText());
        $this->assertEquals($data->originalType ?? '', $entity->getOriginalType());
        $this->assertEquals($data->availability ?? '', $entity->getAvailability());
        $this->assertEquals($data->hasFoil ?? false, $entity->hasFoil());
        $this->assertEquals($data->hasNonFoil ?? false, $entity->hasNonFoil());
        $this->assertEquals($data->isFullArt ?? false, $entity->isFullArt());
        $this->assertEquals($data->isOnlineOnly ?? false, $entity->isOnlineOnly());
        $this->assertEquals($data->isPromo ?? false, $entity->isPromo());
        $this->assertEquals($data->isReprint ?? false, $entity->isReprint());
        $this->assertEquals($data->isAlternative ?? false, $entity->isAlternative());
        $this->assertEquals($data->hasContentWarning ?? false, $entity->hasContentWarning());
        $this->assertEquals($data->isOversized ?? false, $entity->isOversized());
        $this->assertEquals($data->isStarter ?? false, $entity->isStarter());
        $this->assertEquals($data->isStorySpotlight ?? false, $entity->isStorySpotlight());
        $this->assertEquals($data->isTextless ?? false, $entity->isTextless());
        $this->assertEquals($data->isTimeshifted ?? false, $entity->isTimeshifted());
        $this->assertEquals($data->promoTypes ?? [], $entity->getPromoTypes());
        $this->assertEquals($data->count ?? 0, $entity->getCount());
        $this->assertEquals($data->duelDeck ?? '', $entity->getDuelDeck());
    }

    /**
     * @return iterable
     * @throws JsonException
     */
    private function getResponseObject(): array
    {
        return json_decode('[{
            "artist": "David Rapoza",
            "availability": [
              "arena",
              "mtgo",
              "paper"
            ],
            "borderColor": "borderless",
            "colorIdentity": [
              "U"
            ],
            "colors": [
              "U"
            ],
            "convertedManaCost": 3.0,
            "foreignData": [],
            "frameVersion": "2015",
            "hasFoil": true,
            "hasNonFoil": true,
            "identifiers": {
              "mcmId": "492939",
              "mcmMetaId": "315274",
              "mtgjsonV4Id": "bb957fcd-3eba-5cbc-b10a-9d3cf33d6139",
              "scryfallId": "961bb827-f13a-417d-8284-5cd2aac3d034",
              "scryfallIllustrationId": "11ff29e4-7e73-4540-b361-a25d4663e6bc",
              "scryfallOracleId": "7ca99e2f-faf2-4301-a0ae-7cb880ba965b",
              "tcgplayerProductId": "221450"
            },
            "isStarter": true,
            "keywords": [
              "Kicker",
              "Scry"
            ],
            "layout": "normal",
            "leadershipSkills": {
              "brawl": false,
              "commander": false,
              "oathbreaker": true
            },
            "legalities": {},
            "loyalty": "4",
            "manaCost": "{1}{U}{U}",
            "name": "Jace, Mirror Mage",
            "number": "281",
            "printings": [
              "ZNR"
            ],
            "promoTypes": [
              "boosterfun"
            ],
            "purchaseUrls": {
              "cardmarket": "https://mtgjson.com/links/2071d4f604af680f",
              "tcgplayer": "https://mtgjson.com/links/c0c05d4c81f43c87"
            },
            "rarity": "mythic",
            "rulings": [],
            "setCode": "ZNR",
            "subtypes": [
              "Jace"
            ],
            "supertypes": [
              "Legendary"
            ],
            "text": "Kicker {2}\nWhen Jace, Mirror Mage enters the battlefield, if Jace was kicked, create a token that\'s a copy of Jace, Mirror Mage except it\'s not legendary and its starting loyalty is 1.\n[+1]: Scry 2.\n[0]: Draw a card and reveal it. Remove a number of loyalty counters equal to that card\'s converted mana cost from Jace, Mirror Mage.",
            "type": "Legendary Planeswalker — Jace",
            "types": [
              "Planeswalker"
            ],
            "uuid": "1e6cfbf9-83b7-5999-a544-d2b78b9f1a30",
            "variations": [
              "19914d4f-3f02-5050-a11e-c1c72acda20d"
            ]
        }]');
    }
}

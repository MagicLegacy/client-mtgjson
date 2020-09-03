<?php

/*
 * Copyright (c) Deezer
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace MagicLegacy\Component\MtgJson\Test\Formatter;

use MagicLegacy\Component\MtgJson\Entity\Booster;
use MagicLegacy\Component\MtgJson\Entity\Identifiers;
use MagicLegacy\Component\MtgJson\Entity\Translations;
use MagicLegacy\Component\MtgJson\Formatter\SetFormatter;
use PHPUnit\Framework\TestCase;

use Safe\Exceptions\JsonException;

use function Safe\json_decode;

/**
 * Class SetFormatterTest
 */
class SetFormatterTest extends TestCase
{
    /**
     * @return void
     * @throws JsonException
     */
    public function testICanGetValuesFromValueObjectAfterFormatting(): void
    {
        $result = $this->getResponseObject();
        $data   = $result->data;
        $entity = (new SetFormatter())->format($result);

        $this->assertEquals($data->baseSetSize, $entity->getBaseSetSize());
        $this->assertEquals($data->code, $entity->getCode());
        $this->assertEquals($data->isFoilOnly, $entity->isFoilOnly());
        $this->assertEquals($data->isOnlineOnly, $entity->isOnlineOnly());
        $this->assertEquals($data->isPartialPreview, $entity->isPartialPreview());
        $this->assertEquals($data->keyruneCode, $entity->getKeyruneCode());
        $this->assertEquals($data->mcmId, $entity->getMcmId());
        $this->assertEquals($data->mcmName, $entity->getMcmName());
        $this->assertEquals($data->mtgoCode, $entity->getMtgoCode());
        $this->assertEquals($data->name, $entity->getName());
        $this->assertEquals($data->releaseDate, $entity->getReleaseDate());
        $this->assertEquals($data->tcgplayerGroupId, $entity->getTcgplayerGroupId());
        $this->assertEquals($data->totalSetSize, $entity->getTotalSetSize());
        $this->assertEquals($data->type, $entity->getType());

        $this->assertFalse($entity->isNonFoilOnly());
        $this->assertFalse($entity->isPaperOnly());
        $this->assertFalse($entity->isForeignOnly());
        $this->assertEmpty($entity->getBlock());
        $this->assertEmpty($entity->getCodeV3());
        $this->assertEmpty($entity->getParentCode());

        $this->assertInstanceOf(Booster::class, $entity->getBoosters());
        $this->assertCount(4, $entity->getCards());
        $this->assertCount(4, $entity->getCards('name'));
        $this->assertCount(4, $entity->getCards('number'));

        $this->assertInstanceOf(Translations::class, $entity->getTranslation());
        $this->assertEquals('Edition de base 2021', $entity->getTranslation()->getTranslation('French'));
        $this->assertEquals($data->translations, (object) $entity->getTranslation()->getTranslations());


        $tokens = $entity->getTokens();
        $this->assertCount(20, $tokens);

        $this->assertInstanceOf(Identifiers::class, $tokens[0]->getIdentifiers());

        $this->assertEquals($data->tokens[0]->uuid ?? '', $tokens[0]->getUuid());
        $this->assertEquals($data->tokens[0]->colorIdentity, $tokens[0]->getColorIdentity());
        $this->assertEquals($data->tokens[0]->colorIndicator ?? [], $tokens[0]->getColorIndicator());
        $this->assertEquals($data->tokens[0]->colors, $tokens[0]->getColors());
        $this->assertEquals($data->tokens[0]->name, $tokens[0]->getName());
        $this->assertEquals($data->tokens[0]->layout, $tokens[0]->getLayout());
        $this->assertEquals($data->tokens[0]->text, $tokens[0]->getText());
        $this->assertEquals($data->tokens[0]->type, $tokens[0]->getType());
        $this->assertEquals($data->tokens[0]->types, $tokens[0]->getTypes());
        $this->assertEquals($data->tokens[0]->subtypes, $tokens[0]->getSubTypes());
        $this->assertEquals($data->tokens[0]->supertypes, $tokens[0]->getSuperTypes());
        $this->assertEquals($data->tokens[0]->number ?? '', $tokens[0]->getNumber());
        $this->assertEquals($data->tokens[0]->side ?? '', $tokens[0]->getSide());
        $this->assertEquals($data->tokens[0]->faceName ?? '', $tokens[0]->getFaceName());
        $this->assertEquals($data->tokens[0]->asciiName ?? '', $tokens[0]->getAsciiName());
        $this->assertEquals($data->tokens[0]->loyalty ?? '', $tokens[0]->getLoyalty());
        $this->assertEquals($data->tokens[0]->power ?? '', $tokens[0]->getPower());
        $this->assertEquals($data->tokens[0]->toughness ?? '', $tokens[0]->getToughness());
        $this->assertEquals($data->tokens[0]->edhrecRank ?? 0, $tokens[0]->getEdhrecRank());
        $this->assertEquals($data->tokens[0]->otherFaceIds ?? [], $tokens[0]->getOtherFaceIds());
        $this->assertEquals($data->tokens[0]->setCode ?? '', $tokens[0]->getSetCode());
        $this->assertEquals($data->tokens[0]->artist ?? '', $tokens[0]->getArtist());
        $this->assertEquals($data->tokens[0]->flavorText ?? '', $tokens[0]->getFlavorText());
        $this->assertEquals($data->tokens[0]->borderColor ?? '', $tokens[0]->getBorderColor());
        $this->assertEquals($data->tokens[0]->frameEffects ?? [], $tokens[0]->getFrameEffects());
        $this->assertEquals($data->tokens[0]->frameVersion ?? '', $tokens[0]->getFrameVersion());
        $this->assertEquals($data->tokens[0]->watermark ?? '', $tokens[0]->getWatermark());
        $this->assertEquals($data->tokens[0]->keywords ?? [], $tokens[0]->getKeywords());
        $this->assertEquals($data->tokens[0]->availability ?? '', $tokens[0]->getAvailability());
        $this->assertEquals($data->tokens[0]->hasFoil ?? false, $tokens[0]->hasFoil());
        $this->assertEquals($data->tokens[0]->hasNonFoil ?? false, $tokens[0]->hasNonFoil());
        $this->assertEquals($data->tokens[0]->isFullArt ?? false, $tokens[0]->isFullArt());
        $this->assertEquals($data->tokens[0]->isOnlineOnly ?? false, $tokens[0]->isOnlineOnly());
        $this->assertEquals($data->tokens[0]->isPromo ?? false, $tokens[0]->isPromo());
        $this->assertEquals($data->tokens[0]->isReprint ?? false, $tokens[0]->isReprint());
        $this->assertEquals($data->tokens[0]->promoTypes ?? [], $tokens[0]->getPromoTypes());
    }
    /**
     * @return void
     */
    public function testICanGetValuesFromValueObjectAfterFormattingWithEmptyTokenAndTranslation(): void
    {
        $result = $this->getEmptyTokenResponse();
        $entity = (new SetFormatter())->format($result);

        $this->assertCount(0, $entity->getTokens());
        $this->assertInstanceOf(Translations::class, $entity->getTranslation());
    }

    /**
     * @return \stdClass
     * @throws JsonException
     */
    private function getResponseObject(): \stdClass
    {
        return json_decode('{
  "data": {
    "baseSetSize": 4,
    "cards": [
      {
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
      },
      {
          "artist": "Tyler Jacobson",
        "availability": [
          "arena",
          "mtgo",
          "paper"
      ],
        "borderColor": "black",
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
          "mtgjsonV4Id": "e96561a7-9fa0-5aa1-99fd-834659a97fcb",
          "scryfallId": "fe0ed348-e4ed-4b6a-b9d9-03539a6fb42a",
          "scryfallIllustrationId": "96e0e7dc-6466-406d-986e-620c06bbe405",
          "scryfallOracleId": "7ca99e2f-faf2-4301-a0ae-7cb880ba965b",
          "tcgplayerProductId": "221449"
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
        "number": "63",
        "printings": [
          "ZNR"
      ],
        "purchaseUrls": {
          "cardmarket": "https://mtgjson.com/links/61c5e61b8c0f461f",
          "tcgplayer": "https://mtgjson.com/links/80bda0aec80c586f"
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
        "uuid": "19914d4f-3f02-5050-a11e-c1c72acda20d",
        "variations": [
          "1e6cfbf9-83b7-5999-a544-d2b78b9f1a30"
      ]
      },
      {
          "artist": "Anna Steinbauer",
        "availability": [
          "arena",
          "mtgo",
          "paper"
      ],
        "borderColor": "black",
        "colorIdentity": [
          "R",
          "W"
      ],
        "colors": [
          "R",
          "W"
      ],
        "convertedManaCost": 4.0,
        "foreignData": [],
        "frameVersion": "2015",
        "hasFoil": true,
        "hasNonFoil": true,
        "identifiers": {
          "mcmId": "492949",
          "mcmMetaId": "315279",
          "mtgjsonV4Id": "0a59f046-82c0-58ee-a6a4-bbac384677f1",
          "scryfallId": "408be425-b8a6-4c03-b2a6-7ff7bd6555e0",
          "scryfallIllustrationId": "00e84aa8-3e69-4809-ac14-5fcc5e5d1360",
          "scryfallOracleId": "39bbc4cf-53fe-47dd-8ba3-1a59b1fa7dd1",
          "tcgplayerProductId": "221452"
        },
        "isStarter": true,
        "layout": "normal",
        "leadershipSkills": {
          "brawl": false,
          "commander": false,
          "oathbreaker": true
        },
        "legalities": {},
        "loyalty": "4",
        "manaCost": "{2}{R}{W}",
        "name": "Nahiri, Heir of the Ancients",
        "number": "230",
        "printings": [
          "ZNR"
      ],
        "purchaseUrls": {
          "cardmarket": "https://mtgjson.com/links/83c13063fe830d9b",
          "tcgplayer": "https://mtgjson.com/links/023cf26a416b34f0"
        },
        "rarity": "mythic",
        "rulings": [],
        "setCode": "ZNR",
        "subtypes": [
          "Nahiri"
      ],
        "supertypes": [
          "Legendary"
      ],
        "text": "[+1]: Create a 1/1 white Kor Warrior creature token. You may attach an Equipment you control to it.\n[−2]: Look at the top six cards of your library. You may reveal a Warrior or Equipment card from among them and put it into your hand. Put the rest on the bottom of your library in a random order.\n[−3]: Nahiri, Heir of the Ancients deals damage to target creature or planeswalker equal to twice the number of Equipment you control.",
        "type": "Legendary Planeswalker — Nahiri",
        "types": [
          "Planeswalker"
      ],
        "uuid": "42158c39-091a-5392-9379-823e17cf011c",
        "variations": [
          "57c09509-89f1-5318-9a1c-9c61e198dc29"
      ]
      },
      {
          "artist": "David Rapoza",
        "availability": [
          "arena",
          "mtgo",
          "paper"
      ],
        "borderColor": "borderless",
        "colorIdentity": [
          "R",
          "W"
      ],
        "colors": [
          "R",
          "W"
      ],
        "convertedManaCost": 4.0,
        "foreignData": [],
        "frameVersion": "2015",
        "hasFoil": true,
        "hasNonFoil": true,
        "identifiers": {
          "mcmId": "492949",
          "mcmMetaId": "315279",
          "mtgjsonV4Id": "66778423-ba9b-5e12-be6b-a99eaab43583",
          "scryfallId": "6d90ad3d-8d88-470b-897e-2f64376f7f43",
          "scryfallIllustrationId": "64548c59-40c5-4d46-a901-9b4fe075bbef",
          "scryfallOracleId": "39bbc4cf-53fe-47dd-8ba3-1a59b1fa7dd1",
          "tcgplayerProductId": "221451"
        },
        "isStarter": true,
        "layout": "normal",
        "leadershipSkills": {
          "brawl": false,
          "commander": false,
          "oathbreaker": true
        },
        "legalities": {},
        "loyalty": "4",
        "manaCost": "{2}{R}{W}",
        "name": "Nahiri, Heir of the Ancients",
        "number": "282",
        "printings": [
          "ZNR"
      ],
        "promoTypes": [
          "boosterfun"
      ],
        "purchaseUrls": {
          "cardmarket": "https://mtgjson.com/links/df569acfd3136deb",
          "tcgplayer": "https://mtgjson.com/links/c9aca4159121d2cb"
        },
        "rarity": "mythic",
        "rulings": [],
        "setCode": "ZNR",
        "subtypes": [
          "Nahiri"
      ],
        "supertypes": [
          "Legendary"
      ],
        "text": "[+1]: Create a 1/1 white Kor Warrior creature token. You may attach an Equipment you control to it.\n[−2]: Look at the top six cards of your library. You may reveal a Warrior or Equipment card from among them and put it into your hand. Put the rest on the bottom of your library in a random order.\n[−3]: Nahiri, Heir of the Ancients deals damage to target creature or planeswalker equal to twice the number of Equipment you control.",
        "type": "Legendary Planeswalker — Nahiri",
        "types": [
          "Planeswalker"
      ],
        "uuid": "57c09509-89f1-5318-9a1c-9c61e198dc29",
        "variations": [
          "42158c39-091a-5392-9379-823e17cf011c"
      ]
      }
    ],
    "code": "ZNR",
    "isFoilOnly": false,
    "isOnlineOnly": false,
    "isPartialPreview": true,
    "keyruneCode": "ZNR",
    "mcmId": 3404,
    "mcmName": "Zendikar Rising",
    "mtgoCode": "ZNR",
    "name": "Zendikar Rising",
    "releaseDate": "2020-09-25",
    "tcgplayerGroupId": 2648,
    "tokens": [{"artist": "Magali Villeneuve", "availability": ["paper"], "borderColor": "black", "colorIdentity": ["W"], "colors": ["W"], "frameVersion": "2015", "hasFoil": true, "hasNonFoil": true, "identifiers": {"mtgjsonV4Id": "456463c2-fed5-5742-b2fa-13916f8e1bd8", "scryfallId": "9e12d954-3ec2-46e3-b01f-1fd63159e8a4", "scryfallIllustrationId": "52433729-f5bc-46b1-a0b6-d03dc7412241", "scryfallOracleId": "40c64f08-ab2f-4933-8e0e-d1a1c729008f"}, "isReprint": true, "keywords": ["Flying"], "layout": "token", "name": "Angel", "number": "1", "power": "4", "reverseRelated": ["Angelic Ascension", "Speaker of the Heavens"], "setCode": "TM21", "subtypes": ["Angel"], "supertypes": [], "text": "Flying", "toughness": "4", "type": "Token Creature — Angel", "types": ["Token", "Creature"], "uuid": "1468602a-b4fb-5c4a-a498-d01e1c01feb4"}, {"artist": "Kieran Yanner", "availability": ["paper"], "borderColor": "black", "colorIdentity": [], "colors": [], "frameVersion": "2015", "hasFoil": true, "hasNonFoil": true, "identifiers": {"mtgjsonV4Id": "c380d843-13f5-5571-94ea-d627ed9f58e0", "scryfallId": "0d37b555-5931-4084-8f83-e9853e14eccf", "scryfallIllustrationId": "b74168c1-d9c4-4aec-8efd-34a619f5dd66", "scryfallOracleId": "ab67e4ec-9392-4130-970f-6ad65656e5c1"}, "layout": "emblem", "name": "Basri Ket Emblem", "number": "16", "reverseRelated": ["Basri Ket"], "setCode": "TM21", "subtypes": [], "supertypes": [], "text": "At the beginning of combat on your turn, create a 1/1 white Soldier creature token, then put a +1/+1 counter on each creature you control.", "type": "Emblem", "types": ["Emblem"], "uuid": "380d3b56-c427-5911-b92c-81230f3ad738"}, {"artist": "John Donahue", "availability": ["paper"], "borderColor": "black", "colorIdentity": ["G"], "colors": ["G"], "frameVersion": "2015", "hasFoil": true, "hasNonFoil": true, "identifiers": {"mtgjsonV4Id": "7b251209-952b-544d-ad5a-e3cd8d6eab57", "scryfallId": "882247ba-99d2-46db-8314-f800f3366b7f", "scryfallIllustrationId": "b241883c-fe4f-42c9-be2c-2ed51bcc174b", "scryfallOracleId": "6bb61f34-5d57-4eaa-a02c-f5d08c1ee920"}, "isReprint": true, "layout": "token", "name": "Beast", "number": "10", "power": "3", "reverseRelated": ["Elder Gargaroth", "Garruk, Unleashed"], "setCode": "TM21", "subtypes": ["Beast"], "supertypes": [], "toughness": "3", "type": "Token Creature — Beast", "types": ["Token", "Creature"], "uuid": "11346e2d-6867-5b89-868d-baad1f9ead92"}, {"artist": "James Ryman", "availability": ["paper"], "borderColor": "black", "colorIdentity": ["W"], "colors": ["W"], "frameVersion": "2015", "hasFoil": true, "hasNonFoil": true, "identifiers": {"mtgjsonV4Id": "f01d9466-aace-5ea7-961b-08df27302b2e", "scryfallId": "22e33dff-23d5-4f31-8dd6-270657e150d8", "scryfallIllustrationId": "72545e61-6af0-44d7-a880-e7fd676136e4", "scryfallOracleId": "b1a2b096-a440-4ef9-ab2a-059c79999297"}, "isReprint": true, "keywords": ["Flying"], "layout": "token", "name": "Bird", "number": "2", "power": "1", "reverseRelated": ["Falconer Adept"], "setCode": "TM21", "subtypes": ["Bird"], "supertypes": [], "text": "Flying", "toughness": "1", "type": "Token Creature — Bird", "types": ["Token", "Creature"], "uuid": "c874bb19-716e-5350-ab05-04c3ae7ece4a"}, {"artist": "Izzy", "availability": ["paper"], "borderColor": "black", "colorIdentity": ["G"], "colors": ["G"], "frameVersion": "2015", "hasFoil": true, "hasNonFoil": true, "identifiers": {"mtgjsonV4Id": "11e84695-7559-511b-9f5a-89ddf5b4e091", "scryfallId": "f6541414-c506-449d-b3a8-79f47be531a9", "scryfallIllustrationId": "de13472e-1bb8-4e99-a761-f79684f7f31b", "scryfallOracleId": "2069c2cb-3cb7-4f3b-be72-ae783de82c42"}, "layout": "token", "name": "Cat", "number": "11", "power": "2", "reverseRelated": ["Jolrael, Mwonvuli Recluse"], "setCode": "TM21", "subtypes": ["Cat"], "supertypes": [], "toughness": "2", "type": "Token Creature — Cat", "types": ["Token", "Creature"], "uuid": "95dfeb5e-37c9-5637-9711-aee284aa5702"}, {"artist": "Leesha Hannigan", "availability": ["paper"], "borderColor": "black", "colorIdentity": ["G"], "colors": ["G"], "frameVersion": "2015", "hasFoil": true, "hasNonFoil": false, "identifiers": {"mtgjsonV4Id": "f075195e-8640-56cf-a86c-79cd7bb0b703", "scryfallId": "fbdf8dc1-1b10-4fce-97b9-1f5600500cc1", "scryfallIllustrationId": "1d9a3885-bf1a-4e62-9615-dd445dc1e9a4", "scryfallOracleId": "d4454ff8-1671-4bf5-a9f2-30c9d997f975"}, "layout": "token", "name": "Cat", "number": "20", "power": "1", "reverseRelated": [], "setCode": "TM21", "subtypes": ["Cat"], "supertypes": [], "toughness": "1", "type": "Token Creature — Cat", "types": ["Token", "Creature"], "uuid": "6bcccfbf-347f-58c6-aa82-fd740a61e8c3"}, {"artist": "Craig J Spearing", "availability": ["paper"], "borderColor": "black", "colorIdentity": [], "colors": [], "frameVersion": "2015", "hasFoil": true, "hasNonFoil": true, "identifiers": {"mtgjsonV4Id": "a126377f-e363-52be-b421-5b093cdf5b02", "scryfallId": "4001c4c6-647c-4ffc-9803-81df43b77e12", "scryfallIllustrationId": "f093d7dc-d41d-40cc-8fb8-b9f95d7af2bc", "scryfallOracleId": "e63e34da-db53-4444-89f5-d4144b6deffc"}, "isReprint": true, "layout": "token", "name": "Construct", "number": "14", "power": "4", "reverseRelated": ["Chrome Replicator"], "setCode": "TM21", "subtypes": ["Construct"], "supertypes": [], "toughness": "4", "type": "Token Artifact Creature — Construct", "types": ["Token", "Artifact", "Creature"], "uuid": "c7a731ba-0a37-517c-b02c-f57f37c9c118"}, {"artist": "Sidharth Chaturvedi", "availability": ["paper"], "borderColor": "black", "colorIdentity": ["B"], "colors": ["B"], "frameVersion": "2015", "hasFoil": true, "hasNonFoil": true, "identifiers": {"mtgjsonV4Id": "e3094631-f04c-57ef-acf0-5d685844fdf4", "scryfallId": "f54c7f9f-a1ea-4bf0-8ab3-cca49f393f4a", "scryfallIllustrationId": "43848e57-a62a-4bbf-ae56-f7edd1e26fc6", "scryfallOracleId": "0045c5fa-3229-4050-b139-5712fa24b308"}, "isReprint": true, "keywords": ["Flying"], "layout": "token", "name": "Demon", "number": "6", "power": "5", "reverseRelated": ["Archfiend\'s Vessel"], "setCode": "TM21", "subtypes": ["Demon"], "supertypes": [], "text": "Flying", "toughness": "5", "type": "Token Creature — Demon", "types": ["Token", "Creature"], "uuid": "a4dd1ba2-1b49-5196-9796-cc643e718d12"}, {"artist": "Manuel Castañón", "availability": ["paper"], "borderColor": "black", "colorIdentity": ["W"], "colors": ["W"], "frameVersion": "2015", "hasFoil": true, "hasNonFoil": false, "identifiers": {"mtgjsonV4Id": "4af04433-3923-5a45-9067-18cfd81b299c", "scryfallId": "4f8107b3-8539-4b9c-8d0d-c512c940838f", "scryfallIllustrationId": "fac42dee-43d2-445b-8067-b05e7cf24568", "scryfallOracleId": "791a992f-6f67-41a0-8100-a4a6401e6148"}, "layout": "token", "name": "Dog", "number": "19", "power": "1", "reverseRelated": [], "setCode": "TM21", "subtypes": ["Dog"], "supertypes": [], "toughness": "1", "type": "Token Creature — Dog", "types": ["Token", "Creature"], "uuid": "cffaaddc-a438-57e0-a721-a22f1f350763"}, {"artist": "Lie Setiawan", "availability": ["paper"], "borderColor": "black", "colorIdentity": [], "colors": [], "frameVersion": "2015", "hasFoil": true, "hasNonFoil": true, "identifiers": {"mtgjsonV4Id": "760592d6-ad19-5605-9a56-62a7c6ecc9e9", "scryfallId": "b572a46c-8bd0-4af8-bc76-2c65841c27b9", "scryfallIllustrationId": "f0a08f69-cdd9-4f65-afe7-0f4c159e4e36", "scryfallOracleId": "8a908da7-b41c-4712-b7dc-8c6027875d36"}, "layout": "emblem", "name": "Garruk, Unleashed Emblem", "number": "17", "reverseRelated": ["Garruk, Unleashed"], "setCode": "TM21", "subtypes": [], "supertypes": [], "text": "At the beginning of your end step, you may search your library for a creature card, put it onto the battlefield, then shuffle your library", "type": "Emblem", "types": ["Emblem"], "uuid": "0017cb36-348b-57a4-81f5-c5b5159705ab"}, {"artist": "Izzy", "availability": ["paper"], "borderColor": "black", "colorIdentity": ["R"], "colors": ["R"], "edhrecRank": 8130, "frameVersion": "2015", "hasFoil": true, "hasNonFoil": true, "identifiers": {"mtgjsonV4Id": "9785eb80-4663-59b7-85af-9b1b704841c2", "scryfallId": "fd7094d6-6e23-47f2-a9da-4dd680294ac8", "scryfallIllustrationId": "9911c885-28ac-488c-957e-3860b1c04e7c", "scryfallOracleId": "4d7a06f9-2569-4b72-bd5f-5a190337a692"}, "keywords": ["Prowess"], "layout": "token", "name": "Goblin Wizard", "number": "8", "power": "1", "reverseRelated": ["Goblin Wizardry"], "setCode": "TM21", "subtypes": ["Goblin", "Wizard"], "supertypes": [], "text": "Prowess (Whenever you cast a noncreature spell, this creature gets +1/+1 until end of turn.)", "toughness": "1", "type": "Token Creature — Goblin Wizard", "types": ["Token", "Creature"], "uuid": "916b1421-f426-55b4-ac9a-fd9f7372e045"}, {"artist": "Johann Bodin", "availability": ["paper"], "borderColor": "black", "colorIdentity": ["W"], "colors": ["W"], "frameVersion": "2015", "hasFoil": true, "hasNonFoil": true, "identifiers": {"mtgjsonV4Id": "36d94fb3-2a76-5745-a4c8-a9dea02d8187", "scryfallId": "ebbaae25-d0cd-416a-a44a-5b258fd1d9fd", "scryfallIllustrationId": "b1eddbf4-ec73-42bf-9abe-de030b664054", "scryfallOracleId": "3d395892-ef4e-41ea-a66b-99dc3affe51a"}, "isReprint": true, "keywords": ["Flying"], "layout": "token", "name": "Griffin", "number": "3", "power": "2", "reverseRelated": ["Griffin Aerie"], "setCode": "TM21", "subtypes": ["Griffin"], "supertypes": [], "text": "Flying", "toughness": "2", "type": "Token Creature — Griffin", "types": ["Token", "Creature"], "uuid": "76ed2e95-f655-5b86-a404-257876628a67"}, {"artist": "Dan Scott", "availability": ["paper"], "borderColor": "black", "colorIdentity": ["W"], "colors": ["W"], "frameVersion": "2015", "hasFoil": true, "hasNonFoil": true, "identifiers": {"mtgjsonV4Id": "c5833f93-6791-5e35-8de8-72f64cadef79", "scryfallId": "076f934b-a244-45f1-bcb3-7c5e882e9911", "scryfallIllustrationId": "ba6e9677-8009-4e48-bc1b-ac98bb5216a0", "scryfallOracleId": "340aaeb6-cd18-4908-9729-8c53ab02c6f8"}, "isReprint": true, "keywords": ["Vigilance"], "layout": "token", "name": "Knight", "number": "4", "power": "2", "reverseRelated": ["Basri\'s Lieutenant", "Valorous Steed"], "setCode": "TM21", "subtypes": ["Knight"], "supertypes": [], "text": "Vigilance", "toughness": "2", "type": "Token Creature — Knight", "types": ["Token", "Creature"], "uuid": "5f43c683-7b4e-566b-8ded-a6f4311df06e"}, {"artist": "Anna Steinbauer", "availability": ["paper"], "borderColor": "black", "colorIdentity": [], "colors": [], "frameVersion": "2015", "hasFoil": true, "hasNonFoil": true, "identifiers": {"mtgjsonV4Id": "90a80c4b-16cd-5404-b8a4-8d3af498e515", "scryfallId": "968f207e-8e60-4dad-935c-71e0267c2399", "scryfallIllustrationId": "716aad31-09b9-4cff-8be2-66c37edf3fce", "scryfallOracleId": "56c1893f-1382-4a31-a28a-ea604677fcdb"}, "layout": "emblem", "name": "Liliana, Waker of the Dead Emblem", "number": "18", "reverseRelated": ["Liliana, Waker of the Dead"], "setCode": "TM21", "subtypes": [], "supertypes": [], "text": "At the beginning of combat on your turn, put target creature card from a graveyard onto the battlefield under your control. It gains haste.", "type": "Emblem", "types": ["Emblem"], "uuid": "9a0f790a-f3bf-5578-a43c-d8d389202485"}, {"artist": "Jonathan Kuo", "availability": ["paper"], "borderColor": "black", "colorIdentity": ["R"], "colors": ["R"], "frameVersion": "2015", "hasFoil": true, "hasNonFoil": true, "identifiers": {"mtgjsonV4Id": "1d20a0ce-30f7-56fe-8ecf-02b008ab46b3", "scryfallId": "da3002d9-7754-4c7f-a051-382cd7a86e80", "scryfallIllustrationId": "4403f066-21ea-4a93-9450-58214a334d5d", "scryfallOracleId": "f24f68d0-6e81-4294-a084-8ec8f36fef18"}, "layout": "token", "name": "Pirate", "number": "9", "power": "1", "reverseRelated": ["Pursued Whale"], "setCode": "TM21", "subtypes": ["Pirate"], "supertypes": [], "text": "This creature can\'t block.\nCreatures you control attack each combat if able.", "toughness": "1", "type": "Token Creature — Pirate", "types": ["Token", "Creature"], "uuid": "cf9ffa43-3ce7-59ac-9f09-ac718e93a505"}, {"artist": "Brad Rigney", "availability": ["paper"], "borderColor": "black", "colorIdentity": ["G"], "colors": ["G"], "frameVersion": "2015", "hasFoil": true, "hasNonFoil": true, "identifiers": {"mtgjsonV4Id": "7b52f2a4-392e-5f12-aaf3-9826d1297703", "scryfallId": "d71a5aa4-a960-4c42-b8ac-7003f6e83e95", "scryfallIllustrationId": "54430daa-acec-42fc-9330-ef8c4c015569", "scryfallOracleId": "2b7dba01-b08c-4218-9fc1-da55559d9155"}, "isReprint": true, "layout": "token", "name": "Saproling", "number": "12", "power": "1", "reverseRelated": ["Deathbloom Thallid", "Fungal Rebirth", "Sporeweb Weaver"], "setCode": "TM21", "subtypes": ["Saproling"], "supertypes": [], "toughness": "1", "type": "Token Creature — Saproling", "types": ["Token", "Creature"], "uuid": "02f6f528-e3f3-596d-aac6-17589d10f095"}, {"artist": "Jakub Kasper", "availability": ["paper"], "borderColor": "black", "colorIdentity": ["W"], "colors": ["W"], "frameVersion": "2015", "hasFoil": true, "hasNonFoil": true, "identifiers": {"mtgjsonV4Id": "9eeb946c-2549-53ee-a096-de841930e593", "scryfallId": "1bdb2914-bba2-4cb6-802e-af2aeef46de8", "scryfallIllustrationId": "16f4d8b3-5096-46a0-8513-7431eb7c108e", "scryfallOracleId": "eac25f12-6459-438c-a09e-93e23d2cf80d"}, "isReprint": true, "layout": "token", "name": "Soldier", "number": "5", "power": "1", "reverseRelated": ["Basri Ket", "Secure the Scene"], "setCode": "TM21", "subtypes": ["Soldier"], "supertypes": [], "toughness": "1", "type": "Token Creature — Soldier", "types": ["Token", "Creature"], "uuid": "d27f5b6a-7f5d-55d7-81e6-6192087ed01c"}, {"artist": "Alayna Danner", "availability": ["paper"], "borderColor": "black", "colorIdentity": [], "colors": [], "frameVersion": "2015", "hasFoil": true, "hasNonFoil": true, "identifiers": {"mtgjsonV4Id": "b1b7f094-e712-5c8e-a0cf-c7a66fb23c3e", "scryfallId": "4306be80-d7c9-4bcf-a3de-4bf159475546", "scryfallIllustrationId": "4e3ec01f-2a14-49b5-b5d1-f5ea41fa111f", "scryfallOracleId": "3c549374-6c37-42e0-8d88-a8555d46732d"}, "isReprint": true, "layout": "token", "name": "Treasure", "number": "15", "reverseRelated": ["Gadrak, the Crown-Scourge"], "setCode": "TM21", "subtypes": ["Treasure"], "supertypes": [], "text": "{T}, Sacrifice this artifact: Add one mana of any color.", "type": "Token Artifact — Treasure", "types": ["Token", "Artifact"], "uuid": "754fd11c-fb97-5a58-bf3a-fb4e7f179eb1"}, {"artist": "Lie Setiawan", "availability": ["paper"], "borderColor": "black", "colorIdentity": ["R", "U"], "colors": ["R", "U"], "frameVersion": "2015", "hasFoil": true, "hasNonFoil": true, "identifiers": {"mtgjsonV4Id": "d0c034be-9a60-564e-8686-b6c139f79f97", "scryfallId": "2a0d9c67-69ee-48c4-af4c-18cc3c2ef3cd", "scryfallIllustrationId": "ec39a41f-9a3f-476d-a846-2ae3bd049c79", "scryfallOracleId": "a00aa3a1-d93d-4e06-9a75-6f8efe48c6ef"}, "layout": "token", "name": "Weird", "number": "13", "power": "*", "reverseRelated": ["Experimental Overload"], "setCode": "TM21", "subtypes": ["Weird"], "supertypes": [], "toughness": "*", "type": "Token Creature — Weird", "types": ["Token", "Creature"], "uuid": "570c3c71-b13b-509d-a61e-4d3ff221a8c4"}, {"artist": "Anna Steinbauer", "availability": ["paper"], "borderColor": "black", "colorIdentity": ["B"], "colors": ["B"], "frameVersion": "2015", "hasFoil": true, "hasNonFoil": true, "identifiers": {"mtgjsonV4Id": "33a1d372-18e4-531b-a37f-7bc1105c6778", "scryfallId": "3f170f84-6c36-43e2-91e6-3c7a136944b1", "scryfallIllustrationId": "2391d548-fc02-4021-a6c5-fa680b9f4fde", "scryfallOracleId": "ddc8c973-c31e-463f-be45-f3fa7d632362"}, "isReprint": true, "layout": "token", "name": "Zombie", "number": "7", "power": "2", "reverseRelated": ["Liliana\'s Devotee", "Necromentia"], "setCode": "TM21", "subtypes": ["Zombie"], "supertypes": [], "toughness": "2", "type": "Token Creature — Zombie", "types": ["Token", "Creature"], "uuid": "15f25eca-ba72-5b13-ab15-1e6bf04d5dfc"}],
    "totalSetSize": 4,
    "translations": {"Chinese Simplified": null, "Chinese Traditional": null, "French": "Edition de base 2021", "German": null, "Italian": null, "Japanese": null, "Korean": null, "Portuguese (Brazil)": null, "Russian": null, "Spanish": null},
    "type": "expansion"
  },
  "meta": {
    "date": "2020-01-01",
    "version": "1.0.0+20200101"
  }
}');
    }

    private function getEmptyTokenResponse(): \stdClass
    {
        return json_decode('{
  "data": {
    "baseSetSize": 4,
    "cards": [
      {
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
      }
    ],
    "code": "ZNR",
    "isFoilOnly": false,
    "isOnlineOnly": false,
    "isPartialPreview": true,
    "keyruneCode": "ZNR",
    "mcmId": 3404,
    "mcmName": "Zendikar Rising",
    "mtgoCode": "ZNR",
    "name": "Zendikar Rising",
    "releaseDate": "2020-09-25",
    "tcgplayerGroupId": 2648,
    "tokens": [],
    "totalSetSize": 4,
    "translations": {},
    "type": "expansion"
  },
  "meta": {
    "date": "2020-01-01",
    "version": "1.0.0+20200101"
  }
}');
    }
}

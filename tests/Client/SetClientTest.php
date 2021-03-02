<?php

/*
 * Copyright (c) Deezer
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace MagicLegacy\Component\MtgJson\Test\Client;

use MagicLegacy\Component\MtgJson\Client\MtgMeleeClient;
use MagicLegacy\Component\MtgJson\Entity\SetBasic;
use MagicLegacy\Component\MtgJson\Entity\Set;
use MagicLegacy\Component\MtgJson\Exception\MtgJsonComponentException;
use Nyholm\Psr7\Factory\Psr17Factory;
use PHPUnit\Framework\TestCase;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Log\NullLogger;

/**
 * Class SetClientTest
 */
class SetClientTest extends TestCase
{
    /**
     * @return void
     * @throws MtgJsonComponentException
     * @throws ClientExceptionInterface
     */
    public function testICanRequestSetListEndpoint(): void
    {
        $setList = $this->getClient(200, $this->getSetListResponse())->getList();

        $this->assertCount(1, $setList);
        $this->assertInstanceOf(SetBasic::class, $setList[0]);
    }

    /**
     * @return void
     * @throws MtgJsonComponentException
     * @throws ClientExceptionInterface
     */
    public function testICanRequestSetListEndpointThatHaveEmptyContent(): void
    {
        $setList = $this->getClient(200, $this->getSetListResponse(true))->getList();

        $this->assertCount(0, $setList);
    }

    /**
     * @return void
     * @throws MtgJsonComponentException
     * @throws ClientExceptionInterface
     */
    public function testICanRequestAtomicEndpointWithoutCardsAndHaveAnEmptyAtomicCardList(): void
    {
        $set = $this->getClient(200, $this->getSetResponse())->get('M21');

        $this->assertInstanceOf(Set::class, $set);
    }

    /**
     * @param int $status
     * @param string $body
     * @param null $exception
     * @return MtgMeleeClient
     */
    private function getClient(int $status, string $body, $exception = null): MtgMeleeClient
    {
        $httpFactory = new Psr17Factory();
        $response = $httpFactory->createResponse($status);
        $response->getBody()->write($body);
        $response->getBody()->rewind();

        $httpClientMock = $this->createMock(ClientInterface::class);

        if (!empty($exception)) {
            $httpClientMock
                ->method('sendRequest')
                ->willThrowException($exception)
            ;
        } else {
            $httpClientMock
                ->method('sendRequest')
                ->willReturn($response);
        }

        return new MtgMeleeClient($httpClientMock, $httpFactory, $httpFactory, $httpFactory, new NullLogger());
    }

    /**
     * @param bool $emptyContent
     * @return string
     */
    private function getSetListResponse(bool $emptyContent = false): string
    {
        if ($emptyContent) {
            return '{"data": {}}';
        }

        return '{"data": [{"baseSetSize": 2, "code": "P15A", "name": "15th Anniversary Cards", "releaseDate": "2008-04-01", "totalSetSize": 2, "type": "promo"}]}';
    }

    /**
     * @param bool $emptyContent
     * @return string
     */
    private function getSetResponse(bool $emptyContent = false): string
    {
        if ($emptyContent) {
            return '{"data": {}}';
        }

        return '{
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
}';
    }
}

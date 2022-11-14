<?php

/*
 * Copyright (c) Deezer
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace MagicLegacy\Component\MtgJson\Tests\Formatter;

use MagicLegacy\Component\MtgJson\Entity\CardAtomic;
use MagicLegacy\Component\MtgJson\Entity\Identifiers;
use MagicLegacy\Component\MtgJson\Entity\LeadershipSkills;
use MagicLegacy\Component\MtgJson\Entity\Legalities;
use MagicLegacy\Component\MtgJson\Entity\PurchaseUrls;
use MagicLegacy\Component\MtgJson\Enumerator\LegalityEnumerator;
use MagicLegacy\Component\MtgJson\Formatter\CardAtomicFormatter;
use PHPUnit\Framework\TestCase;

/**
 * Class CardAtomicFormatterTest
 */
class CardAtomicFormatterTest extends TestCase
{
    /**
     * @return void
     * @throws \JsonException
     */
    public function testICanGetValuesFromValueObjectAfterFormatting(): void
    {
        $result   = $this->getResponseObject();
        $cards    = (array) $result->data;
        $entities = (new CardAtomicFormatter())->format($result);

        /** @var CardAtomic $entity */
        $entity = reset($entities);
        $data   = reset($cards);
        $data   = reset($data); // first element

        $this->assertEquals($data->colorIdentity, $entity->getColorIdentity());
        $this->assertEquals([], $entity->getColorIndicator());
        $this->assertEquals($data->colors, $entity->getColors());
        $this->assertEquals($data->convertedManaCost, $entity->getConvertedManaCost());
        $this->assertEquals($data->manaCost, $entity->getManaCost());
        $this->assertEquals($data->name, $entity->getName());

        $this->assertEquals($data->edhrecRank, $entity->getEdhrecRank());
        $this->assertEquals($data->layout, $entity->getLayout());
        $this->assertEquals($data->printings, $entity->getPrintings());
        $this->assertEquals($data->keywords, $entity->getKeywords());
        $this->assertEquals($data->text, $entity->getText());
        $this->assertEquals($data->type, $entity->getType());
        $this->assertEquals($data->types, $entity->getTypes());

        $this->assertIsArray($entity->getAllForeignData());
        $this->assertCount(10, $entity->getAllForeignData());
        $foreignDataFr = $entity->getForeignData('French');
        $this->assertEquals($data->foreignData[2]->language, $foreignDataFr->getLanguage());
        $this->assertEquals($data->foreignData[2]->name, $foreignDataFr->getName());
        $this->assertEquals($data->foreignData[2]->type, $foreignDataFr->getType());
        $this->assertEquals($data->foreignData[2]->text, $foreignDataFr->getText());
        $this->assertEquals($data->foreignData[2]->flavorText, $foreignDataFr->getFlavorText());
        $this->assertEquals('', $foreignDataFr->getFaceName());
        $this->assertEquals(0, $foreignDataFr->getMultiverseId());


        $identifiers = $entity->getIdentifiers();
        $this->assertInstanceOf(Identifiers::class, $identifiers);
        $this->assertEquals($data->identifiers->cardKingdomFoilId ?? '', $identifiers->getCardKingdomFoilId());
        $this->assertEquals($data->identifiers->cardKingdomId ?? '', $identifiers->getCardKingdomId());
        $this->assertEquals($data->identifiers->mcmId ?? '', $identifiers->getMcmId());
        $this->assertEquals($data->identifiers->mcmMetaId ?? '', $identifiers->getMcmMetaId());
        $this->assertEquals($data->identifiers->mtgArenaId ?? '', $identifiers->getMtgArenaId());
        $this->assertEquals($data->identifiers->mtgoFoilId ?? '', $identifiers->getMtgoFoilId());
        $this->assertEquals($data->identifiers->mtgoId ?? '', $identifiers->getMtgoId());
        $this->assertEquals($data->identifiers->mtgjsonV4Id ?? '', $identifiers->getMtgjsonV4Id());
        $this->assertEquals($data->identifiers->multiverseId ?? '', $identifiers->getMultiverseId());
        $this->assertEquals($data->identifiers->scryfallId ?? '', $identifiers->getScryfallId());
        $this->assertEquals($data->identifiers->scryfallOracleId ?? '', $identifiers->getScryfallOracleId());
        $this->assertEquals($data->identifiers->scryfallIllustrationId ?? '', $identifiers->getScryfallIllustrationId());
        $this->assertEquals($data->identifiers->tcgplayerProductId ?? '', $identifiers->getTcgplayerProductId());

        $legalities = $entity->getLegalities();
        $this->assertInstanceOf(Legalities::class, $legalities);
        $this->assertEquals($data->legalities->brawl ?? LegalityEnumerator::NOT_LEGAL, $legalities->getBrawl());
        $this->assertEquals($data->legalities->commander ?? LegalityEnumerator::NOT_LEGAL, $legalities->getCommander());
        $this->assertEquals($data->legalities->duel ?? LegalityEnumerator::NOT_LEGAL, $legalities->getDuel());
        $this->assertEquals($data->legalities->future ?? LegalityEnumerator::NOT_LEGAL, $legalities->getFuture());
        $this->assertEquals($data->legalities->frontier ?? LegalityEnumerator::NOT_LEGAL, $legalities->getFrontier());
        $this->assertEquals($data->legalities->legacy ?? LegalityEnumerator::NOT_LEGAL, $legalities->getLegacy());
        $this->assertEquals($data->legalities->modern ?? LegalityEnumerator::NOT_LEGAL, $legalities->getModern());
        $this->assertEquals($data->legalities->pauper ?? LegalityEnumerator::NOT_LEGAL, $legalities->getPauper());
        $this->assertEquals($data->legalities->penny ?? LegalityEnumerator::NOT_LEGAL, $legalities->getPenny());
        $this->assertEquals($data->legalities->pioneer ?? LegalityEnumerator::NOT_LEGAL, $legalities->getPioneer());
        $this->assertEquals($data->legalities->standard ?? LegalityEnumerator::NOT_LEGAL, $legalities->getStandard());
        $this->assertEquals($data->legalities->vintage ?? LegalityEnumerator::NOT_LEGAL, $legalities->getVintage());

        $purchaseUrls = $entity->getPurchaseUrls();
        $this->assertInstanceOf(PurchaseUrls::class, $purchaseUrls);
        $this->assertEquals($data->purchaseUrls->cardKingdom, $purchaseUrls->getCardKingdom());
        $this->assertEquals($data->purchaseUrls->cardKingdomFoil, $purchaseUrls->getCardKingdomFoil());
        $this->assertEquals($data->purchaseUrls->cardmarket, $purchaseUrls->getCardmarket());
        $this->assertEquals($data->purchaseUrls->tcgplayer, $purchaseUrls->getTcgplayer());

        $rulings = $entity->getRulings();
        $this->assertIsArray($rulings);
        $this->assertCount(1, $rulings);
        $this->assertEquals($data->rulings[0]->date, $rulings[0]->getDate());
        $this->assertEquals($data->rulings[0]->text, $rulings[0]->getText());

        $this->assertIsArray($entity->getSubTypes());
        $this->assertCount(0, $entity->getSubTypes());

        $this->assertIsArray($entity->getSuperTypes());
        $this->assertCount(0, $entity->getSuperTypes());

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

        $leadershipSkills = $entity->getLeadershipSkills();
        $this->assertInstanceOf(LeadershipSkills::class, $entity->getLeadershipSkills());
        $this->assertFalse($leadershipSkills->hasBrawl());
        $this->assertFalse($leadershipSkills->hasCommander());
        $this->assertFalse($leadershipSkills->hasOathbreaker());
    }

    /**
     * @return \stdClass
     * @throws \JsonException
     */
    private function getResponseObject(): \stdClass
    {
        return json_decode('{
  "meta": {
    "date": "2020-01-01",
    "version": "1.0.0+20200101"
  },
  "data": {
    "Absorb": [
      {
        "colorIdentity": [
          "U",
          "W"
        ],
        "colors": [
          "U",
          "W"
        ],
        "convertedManaCost": 3.0,
        "edhrecRank": 3170,
        "foreignData": [
          {
            "flavorText": "„Dein fehlgeleiteter Versuch, die Gesetze zu unterlaufen, beweist, dass diese Gesetze dringend notwendig sind.\"",
            "language": "German",
            "name": "Absorbieren",
            "text": "Neutralisiere einen Zauberspruch deiner Wahl. Du erhältst 3 Lebenspunkte dazu.",
            "type": "Spontanzauber"
          },
          {
            "flavorText": "\"En tu intento equivocado de subvertir la ley, explicaste con elocuencia por qué debe existir\".",
            "language": "Spanish",
            "name": "Absorber",
            "text": "Contrarresta el hechizo objetivo. Ganas 3 vidas.",
            "type": "Instantáneo"
          },
          {
            "flavorText": "« Dans votre tentative malavisée de renverser la loi, vous avez expliqué avec éloquence pourquoi elle doit exister. »",
            "language": "French",
            "name": "Absorption",
            "text": "Contrecarrez le sort ciblé. Vous gagnez 3 points de vie.",
            "type": "Éphémère"
          },
          {
            "flavorText": "\"Con il tuo malaccorto tentativo di sovvertire la legge, ne hai dimostrato esaustivamente la necessità.\"",
            "language": "Italian",
            "name": "Assorbire",
            "text": "Neutralizza una magia bersaglio. Guadagni 3 punti vita.",
            "type": "Istantaneo"
          },
          {
            "flavorText": "「法を脅かすという君の誤った試みの中に、法がなくてはならない理由が雄弁に語られている。」",
            "language": "Japanese",
            "name": "吸収",
            "text": "呪文１つを対象とし、それを打ち消す。あなたは３点のライフを得る。",
            "type": "インスタント"
          },
          {
            "flavorText": "\"잘못된 판단에 근거해 법을 전복시키려 한 네 시도가 왜 법이 존재해야만 하는지를 역설해 주었다.\"",
            "language": "Korean",
            "name": "흡수",
            "text": "주문을 목표로 정한다. 그 주문을 무효화한다. 당신은 생명 3점을 얻는다.",
            "type": "순간마법"
          },
          {
            "flavorText": "\"Em sua equivocada tentativa de subverter a lei, você explicou eloquentemente a necessidade da lei.\"",
            "language": "Portuguese (Brazil)",
            "name": "Absorver",
            "text": "Anule a mágica alvo. Você ganha 3 pontos de vida.",
            "type": "Mágica Instantânea"
          },
          {
            "flavorText": "«Своей нелепой попыткой помешать исполнению закона ты лишь красноречиво показал, почему он должен существовать».",
            "language": "Russian",
            "name": "Поглощение",
            "text": "Отмените целевое заклинание. Вы получаете 3 жизни.",
            "type": "Мгновенное заклинание"
          },
          {
            "flavorText": "「在你试图颠覆律法的错误过程中，你已经完美地阐述了律法为何必须存在。」",
            "language": "Chinese Simplified",
            "name": "吸收",
            "text": "反击目标咒语。你获得3点生命。",
            "type": "瞬间"
          },
          {
            "flavorText": "「在你試圖顛覆律法的錯誤過程中，你已經完美地闡述了律法為何必須存在。」",
            "language": "Chinese Traditional",
            "name": "吸收",
            "text": "反擊目標咒語。你獲得3點生命。",
            "type": "瞬間"
          }
        ],
        "identifiers": {
          "scryfallOracleId": "132ca99a-a3c7-4ed6-b4d0-0edcd7140ca2"
        },
        "layout": "normal",
        "legalities": {
          "brawl": "Legal",
          "commander": "Legal",
          "duel": "Legal",
          "historic": "Legal",
          "legacy": "Legal",
          "modern": "Legal",
          "pioneer": "Legal",
          "standard": "Legal",
          "vintage": "Legal"
        },
        "manaCost": "{W}{U}{U}",
        "name": "Absorb",
        "printings": [
          "INV",
          "PRNA",
          "RNA"
        ],
        "purchaseUrls": {
          "cardKingdom": "https://mtgjson.com/links/97df0cbe32ca7578",
          "cardKingdomFoil": "https://mtgjson.com/links/8824adcfb522f4bc",
          "cardmarket": "https://mtgjson.com/links/3a6dcfad03f4e1a7",
          "tcgplayer": "https://mtgjson.com/links/5ea175bf444f70fe"
        },
        "rulings": [
          {
            "date": "2019-01-25",
            "text": "A spell that can’t be countered is a legal target for Absorb. The spell won’t be countered when Absorb resolves, but you’ll still gain 3 life."
          }
        ],
        "subtypes": [],
        "supertypes": [],
        "keywords": [],
        "text": "Counter target spell. You gain 3 life.",
        "type": "Instant",
        "types": [
          "Instant"
        ]
      }
    ],
    "Any Minimal Card": [
      {
        "colorIdentity": [],
        "colors": [],
        "convertedManaCost": 0.0,
        "edhrecRank": 3170,
        "foreignData": [],
        "identifiers": null,
        "layout": "normal",
        "legalities": null,
        "manaCost": "{W}{U}{U}",
        "name": "Absorb",
        "printings": [],
        "purchaseUrls": null,
        "rulings": [],
        "subtypes": [],
        "supertypes": [],
        "text": "Counter target spell. You gain 3 life.",
        "type": "Instant",
        "types": []
      }
    ]
  }
}', false, 512, JSON_THROW_ON_ERROR);
    }
}

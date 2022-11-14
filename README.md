# MtgJson Client for API V5

[![Current version](https://img.shields.io/packagist/v/magiclegacy/mtgjson-client.svg?logo=composer)](https://packagist.org/packages/magiclegacy/mtgjson-client)
[![Supported PHP version](https://img.shields.io/static/v1?logo=php&label=PHP&message=7.4|8.0|8.1&color=777bb4)](https://packagist.org/packages/magiclegacy/mtgjson-client)
[![Coverage](https://sonarcloud.io/api/project_badges/measure?project=MagicLegacy_mtgjson-client&metric=coverage)](https://sonarcloud.io/dashboard?id=MagicLegacy_mtgjson-client)
[![Quality Gate Status](https://sonarcloud.io/api/project_badges/measure?project=MagicLegacy_mtgjson-client&metric=alert_status)](https://sonarcloud.io/dashboard?id=MagicLegacy_mtgjson-client)
[![CI](https://github.com/MagicLegacy/mtgjson-client/workflows/CI/badge.svg)](https://github.com/MagicLegacy/mtgjson-client/actions)

MtgJson Client to retrieve some information from MtgJson.com

Supported endpoints:
 * `/SetList.json`
 * `/{SetCode}.json`
 * `/CardTypes.json`
 * `/AtomicCards.json`
 * `/LegacyAtomic.json`
 * `/PauperAtomic.json`
 * `/PioneerAtomic.json`
 * `/ModernAtomic.json`
 * `/StandardAtomic.json`
 * `/VintageAtomic.json`

Currently NOT supported:
 * `/EnumValues.json`
 * `/Keywords.json`
 * `/Legacy.json`
 * `/Pioneer.json`
 * `/Modern.json`
 * `/Standard.json`
 * `/Vintage.json`
 * `/CompiledList`
 * `/DeckList`

## Composer
```bash
composer require magiclegacy/mtgjson-client
```

## Usage in application
```php
<?php

namespace Application;

use MagicLegacy\Component\MtgJson\Client\MtgJsonClient;
use Eureka\Component\Curl;
use Nyholm\Psr7\Factory\Psr17Factory;
use Psr\Log\NullLogger;

//~ Declare tier required services (included as dependencies)
$httpFactory   = new Psr17Factory();
$mtgJsonClient = new MtgJsonClient(
    new Curl\HttpClient(),
    $httpFactory,
    $httpFactory,
    $httpFactory,
    new NullLogger()
);

$setList = $mtgJsonClient->getList();

foreach ($setList as $setBasic) {

    echo (string) $setBasic->getCode() . ' - ' . $setBasic->getName() . PHP_EOL;
}
```
see: [example.php](./examples/SetList.php)

The output will be:
```text
P15A - 15th Anniversary Cards
HTR - 2016 Heroes of the Realm
G17 - 2017 Gift Pack
HTR17 - 2017 Heroes of the Realm
PLNY - 2018 Lunar New Year
AER - Aether Revolt
PAER - Aether Revolt Promos
ARB - Alara Reborn
ALL - Alliances
AKH - Amonkhet
MP2 - Amonkhet Invocations
PAKH - Amonkhet Promos
AKR - Amonkhet Remastered
ATH - Anthologies
ATQ - Antiquities
APC - Apocalypse
[...]
PWOR - World Championship Promos
PWCQ - World Magic Cup Qualifiers
WWK - Worldwake
PWWK - Worldwake Promos
PSS2 - XLN Standard Showdown
PXTC - XLN Treasure Chest
ZEN - Zendikar
EXP - Zendikar Expeditions
PZEN - Zendikar Promos
```

## MtgJsonClient

### About Sets

Available methods:
 * `MtgJsonClient::getList()`: `SetBasic[]`
 * `MtgJsonClient::get($setCode)`: `Set[]`
 
 
### About Atomic Cards

Available methods:
 * `MtgJsonClient::getAllAtomicCards()`: `AtomicCard[]`
 * `MtgJsonClient::getLegacyAtomicCards()`: `AtomicCard[]`
 * `MtgJsonClient::getModernAtomicCards()`: `AtomicCard[]`
 * `MtgJsonClient::getPauperAtomicCards()`: `AtomicCard[]`
 * `MtgJsonClient::getPioneerAtomicCards()`: `AtomicCard[]`
 * `MtgJsonClient::getStandardAtomicCards()`: `AtomicCard[]`
 * `MtgJsonClient::getVintageAtomicCards()`: `AtomicCard[]`
  
### About Card Types

Available methods:
 * `MtgJsonClient::getCardTypes()`: `CardTypes`

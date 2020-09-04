# MtgJson Client for API V5

[![Current version](https://img.shields.io/packagist/v/magiclegacy/mtgjson-client.svg?logo=composer)](https://packagist.org/packages/magiclegacy/mtgjson-client)
[![Supported PHP version](https://img.shields.io/static/v1?logo=php&label=PHP&message=%5E7.3&color=777bb4)](https://packagist.org/packages/magiclegacy/mtgjson-client)
[![codecov](https://codecov.io/gh/MagicLegacy/mtgjson-client/branch/master/graph/badge.svg)](https://codecov.io/gh/MagicLegacy/mtgjson-client)
[![Build Status](https://travis-ci.org/MagicLegacy/mtgjson-client.svg?branch=master)](https://travis-ci.org/MagicLegacy/mtgjson-client)
[![CI](https://github.com/MagicLegacy/mtgjson-client/workflows/CI/badge.svg)](https://github.com/MagicLegacy/mtgjson-client/actions)

MtgJson Client to retrieve some information from MtgJson.com

Supported endpoints:
 * `/SetList.json`


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

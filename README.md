# MtgJson Client for API V5

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

use MagicLegacy\Component\MtgJson\Client\SetClient;
use Eureka\Component\Curl;
use Nyholm\Psr7\Factory\Psr17Factory;
use Psr\Log\NullLogger;

//~ Declare tier required services (included as dependencies)
$httpFactory = new Psr17Factory();
$setClient   = new SetClient(
    new Curl\HttpClient(),
    $httpFactory,
    $httpFactory,
    $httpFactory,
    new NullLogger()
);

$setList = $setClient->getList();

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

## Clients

### SetClient

Available method:
 * `SetClient::getList(): SetBasic[]`
  
<?php

namespace Application;

use MagicLegacy\Component\MtgJson\Client\MtgJsonClient;
use Eureka\Component\Curl;
use MagicLegacy\Component\MtgJson\Entity\ForeignData;
use Nyholm\Psr7\Factory\Psr17Factory;
use Psr\Log\NullLogger;

require_once __DIR__ . '/../vendor/autoload.php';

//~ Declare tier required services (included as dependencies)
$httpFactory   = new Psr17Factory();
$mtgJsonClient = new MtgJsonClient(
    new Curl\HttpClient(),
    $httpFactory,
    $httpFactory,
    $httpFactory,
    new NullLogger()
);

$set = $mtgJsonClient->get('M21');

echo '[' . $set->getCode() . '] ' . $set->getName() . ' - ' . $set->getReleaseDate() . PHP_EOL;
foreach ($set->getCards('number') as $card) {
    $cardFR = $card->getForeignData('French') ?? new ForeignData('', '', '', '', '', 0, '');
    echo ' * ' . $card->getName() . ' (FR: ' . $cardFR->getName() . ') - ' . $card->getNumber() . '/' . $set->getTotalSetSize() . PHP_EOL;
}

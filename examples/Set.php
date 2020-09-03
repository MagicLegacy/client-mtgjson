<?php

namespace Application;

use MagicLegacy\Component\MtgJson\Client\SetClient;
use Eureka\Component\Curl;
use Nyholm\Psr7\Factory\Psr17Factory;
use Psr\Log\NullLogger;

require_once __DIR__ . '/../vendor/autoload.php';

//~ Declare tier required services (included as dependencies)
$httpFactory = new Psr17Factory();
$setClient   = new SetClient(
    new Curl\HttpClient(),
    $httpFactory,
    $httpFactory,
    $httpFactory,
    new NullLogger()
);

$set = $setClient->get('M21');

echo '[' . $set->getCode() . '] ' . $set->getName() . ' - ' . $set->getReleaseDate() . PHP_EOL;
foreach ($set->getCards('number') as $card) {
    $cardFR = $card->getForeignData('French');
    echo ' * ' . $card->getName() . ' (FR: ' . $cardFR->getName() . ') - ' . $card->getNumber() . '/' . $set->getTotalSetSize() . PHP_EOL;
}
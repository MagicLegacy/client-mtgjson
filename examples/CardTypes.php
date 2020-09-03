<?php

namespace Application;

use MagicLegacy\Component\MtgJson\Client\SetClient;
use Eureka\Component\Curl;
use MagicLegacy\Component\MtgJson\Client\TypesClient;
use Nyholm\Psr7\Factory\Psr17Factory;
use Psr\Log\NullLogger;

require_once __DIR__ . '/../vendor/autoload.php';

//~ Declare tier required services (included as dependencies)
$httpFactory = new Psr17Factory();
$typesClient = new TypesClient(
    new Curl\HttpClient(),
    $httpFactory,
    $httpFactory,
    $httpFactory,
    new NullLogger()
);

$cardTypes = $typesClient->getCardTypes();

$allTypes = [
    'Artifact',
    'Conspiracy',
    'Creature',
    'Enchantment',
    'Instant',
    'Land',
    'Phenomenon',
    'Plane',
    'Planeswalker',
    'Scheme',
    'Sorcery',
    'Tribal',
    'Vanguard',
];

foreach ($allTypes as $type) {
    $getter = 'get' . $type;

    echo '# ' . $type . PHP_EOL;
    echo '## SubTypes' . PHP_EOL;
    foreach ($cardTypes->$getter()->getSubTypes() as $subType) {
        echo ' * ' . $subType . PHP_EOL;
    }
    echo '## SuperTypes' . PHP_EOL;
    foreach ($cardTypes->$getter()->getSuperTypes() as $superType) {
        echo ' * ' . $superType . PHP_EOL;
    }
    echo PHP_EOL;
}
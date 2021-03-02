<?php

namespace Application;

use MagicLegacy\Component\MtgJson\Client\MtgJsonClient;
use Eureka\Component\Curl;
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

$setList = $mtgJsonClient->getList();

foreach ($setList as $setBasic) {

    echo (string) $setBasic->getCode() . ' - ' . $setBasic->getName() . PHP_EOL;
}

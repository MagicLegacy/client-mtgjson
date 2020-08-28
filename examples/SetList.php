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

$setList = $setClient->getList();

foreach ($setList as $setBasic) {

    echo (string) $setBasic->getCode() . ' - ' . $setBasic->getName() . PHP_EOL;
}
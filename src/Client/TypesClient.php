<?php

/*
 * Copyright (c) Romain Cottard
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace MagicLegacy\Component\MtgJson\Client;

use MagicLegacy\Component\MtgJson\Entity\CardTypes;
use MagicLegacy\Component\MtgJson\Exception\MtgJsonClientException;
use MagicLegacy\Component\MtgJson\Formatter\CardTypesFormatter;

/**
 * Class TypesClient
 *
 * @author Romain Cottard
 */
class TypesClient extends AbstractClient
{
    /**
     * @return CardTypes
     * @throws MtgJsonClientException
     */
    public function getCardTypes(): CardTypes
    {
        $path   = '/CardTypes.json';
        return $this->fetchResult($path, new CardTypesFormatter());
    }
}

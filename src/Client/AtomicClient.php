<?php

/*
 * Copyright (c) Romain Cottard
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace MagicLegacy\Component\MtgJson\Client;

use MagicLegacy\Component\MtgJson\Entity\CardAtomic;
use MagicLegacy\Component\MtgJson\Exception\MtgJsonClientException;
use MagicLegacy\Component\MtgJson\Formatter\CardAtomicFormatter;

/**
 * Class AtomicClient
 *
 * @author Romain Cottard
 */
class AtomicClient extends AbstractClient
{
    /**
     * @return CardAtomic[]
     * @throws MtgJsonClientException
     */
    public function getAllCards(): iterable
    {
        return $this->getCards('/AtomicCards.json');
    }

    /**
     * @return CardAtomic[]
     * @throws MtgJsonClientException
     */
    public function getLegacyCards(): iterable
    {
        return $this->getCards('/LegacyAtomic.json');
    }

    /**
     * @return CardAtomic[]
     * @throws MtgJsonClientException
     */
    public function getModernCards(): iterable
    {
        return $this->getCards('/ModernAtomic.json');
    }

    /**
     * @return CardAtomic[]
     * @throws MtgJsonClientException
     */
    public function getPauperCards(): iterable
    {
        return $this->getCards('/PauperAtomic.json');
    }

    /**
     * @return CardAtomic[]
     * @throws MtgJsonClientException
     */
    public function getPioneerCards(): iterable
    {
        return $this->getCards('/PioneerAtomic.json');
    }

    /**
     * @return CardAtomic[]
     * @throws MtgJsonClientException
     */
    public function getStandardCards(): iterable
    {
        return $this->getCards('/StandardAtomic.json');
    }

    /**
     * @return CardAtomic[]
     * @throws MtgJsonClientException
     */
    public function getVintageCards(): iterable
    {
        return $this->getCards('/VintageAtomic.json');
    }

    /**
     * @param string $path
     * @return iterable
     * @throws MtgJsonClientException
     */
    private function getCards(string $path): iterable
    {
        $result = $this->fetchResult($path, new CardAtomicFormatter());

        if (empty($result)) {
            $result = [];
        }

        return $result;
    }
}

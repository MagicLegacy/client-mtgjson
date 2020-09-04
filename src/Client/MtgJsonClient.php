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
use MagicLegacy\Component\MtgJson\Entity\CardTypes;
use MagicLegacy\Component\MtgJson\Entity\Set;
use MagicLegacy\Component\MtgJson\Entity\SetBasic;
use MagicLegacy\Component\MtgJson\Exception\MtgJsonClientException;
use MagicLegacy\Component\MtgJson\Formatter\CardAtomicFormatter;
use MagicLegacy\Component\MtgJson\Formatter\CardTypesFormatter;
use MagicLegacy\Component\MtgJson\Formatter\SetFormatter;
use MagicLegacy\Component\MtgJson\Formatter\SetListFormatter;

/**
 * Class AtomicClient
 *
 * @author Romain Cottard
 */
class MtgJsonClient extends AbstractClient
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

    /**
     * @return SetBasic[]
     * @throws MtgJsonClientException
     */
    public function getList(): iterable
    {
        $path   = '/SetList.json';
        $result = $this->fetchResult($path, new SetListFormatter());

        if (empty($result)) {
            $result = [];
        }

        return $result;
    }

    /**
     * @param string
     * @return Set
     * @throws MtgJsonClientException
     */
    public function get(string $setCode): Set
    {
        $path = '/' . $setCode . '.json';
        return $this->fetchResult($path, new SetFormatter());
    }

    /**
     * @return CardAtomic[]
     * @throws MtgJsonClientException
     */
    public function getAllAtomicCards(): iterable
    {
        return $this->getAtomicCards('/AtomicCards.json');
    }

    /**
     * @return CardAtomic[]
     * @throws MtgJsonClientException
     */
    public function getLegacyAtomicCards(): iterable
    {
        return $this->getAtomicCards('/LegacyAtomic.json');
    }

    /**
     * @return CardAtomic[]
     * @throws MtgJsonClientException
     */
    public function getModernAtomicCards(): iterable
    {
        return $this->getAtomicCards('/ModernAtomic.json');
    }

    /**
     * @return CardAtomic[]
     * @throws MtgJsonClientException
     */
    public function getPauperAtomicCards(): iterable
    {
        return $this->getAtomicCards('/PauperAtomic.json');
    }

    /**
     * @return CardAtomic[]
     * @throws MtgJsonClientException
     */
    public function getPioneerAtomicCards(): iterable
    {
        return $this->getAtomicCards('/PioneerAtomic.json');
    }

    /**
     * @return CardAtomic[]
     * @throws MtgJsonClientException
     */
    public function getStandardAtomicCards(): iterable
    {
        return $this->getAtomicCards('/StandardAtomic.json');
    }

    /**
     * @return CardAtomic[]
     * @throws MtgJsonClientException
     */
    public function getVintageAtomicCards(): iterable
    {
        return $this->getAtomicCards('/VintageAtomic.json');
    }

    /**
     * @param string $path
     * @return iterable
     * @throws MtgJsonClientException
     */
    private function getAtomicCards(string $path): iterable
    {
        $result = $this->fetchResult($path, new CardAtomicFormatter());

        if (empty($result)) {
            $result = [];
        }

        return $result;
    }
}

<?php

/*
 * Copyright (c) Romain Cottard
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace MagicLegacy\Component\MtgJson\Entity;

use MagicLegacy\Component\MtgJson\Serializer\MtgJsonSerializableTrait;

/**
 * Class PurchaseUrls
 *
 * @author Romain Cottard
 */
final class PurchaseUrls implements \JsonSerializable
{
    use MtgJsonSerializableTrait;

    /** @var string */
    private $cardKingdom;

    /** @var string */
    private $cardKingdomFoil;

    /** @var string */
    private $cardmarket;

    /** @var string */
    private $tcgplayer;

    /**
     * PurchaseUrls constructor.
     *
     * @param string $cardKingdom
     * @param string $cardKingdomFoil
     * @param string $cardmarket
     * @param string $tcgplayer
     */
    public function __construct(
        string $cardKingdom,
        string $cardKingdomFoil,
        string $cardmarket,
        string $tcgplayer
    ) {
        $this->cardKingdom     = $cardKingdom;
        $this->cardKingdomFoil = $cardKingdomFoil;
        $this->cardmarket      = $cardmarket;
        $this->tcgplayer       = $tcgplayer;
    }

    /**
     * @return string
     */
    public function getCardKingdom(): string
    {
        return $this->cardKingdom;
    }

    /**
     * @return string
     */
    public function getCardKingdomFoil(): string
    {
        return $this->cardKingdomFoil;
    }

    /**
     * @return string
     */
    public function getCardmarket(): string
    {
        return $this->cardmarket;
    }

    /**
     * @return string
     */
    public function getTcgplayer(): string
    {
        return $this->tcgplayer;
    }
}

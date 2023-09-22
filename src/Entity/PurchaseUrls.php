<?php

/*
 * Copyright (c) Romain Cottard
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace MagicLegacy\Component\MtgJson\Entity;

use Eureka\Component\Serializer\JsonSerializableTrait;

/**
 * Class PurchaseUrls
 *
 * @author Romain Cottard
 */
final class PurchaseUrls implements \JsonSerializable
{
    use JsonSerializableTrait;

    private string $cardKingdom;
    private string $cardKingdomFoil;
    private string $cardmarket;
    private string $tcgplayer;

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

    public function getCardKingdom(): string
    {
        return $this->cardKingdom;
    }

    public function getCardKingdomFoil(): string
    {
        return $this->cardKingdomFoil;
    }

    public function getCardmarket(): string
    {
        return $this->cardmarket;
    }

    public function getTcgplayer(): string
    {
        return $this->tcgplayer;
    }
}

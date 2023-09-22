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
 * Class Identifiers
 *
 * @author Romain Cottard
 */
final class Identifiers implements \JsonSerializable
{
    use JsonSerializableTrait;

    private string $cardKingdomFoilId;
    private string $cardKingdomId;
    private string $mcmId;
    private string $mcmMetaId;
    private string $mtgArenaId;
    private string $mtgoFoilId;
    private string $mtgoId;
    private string $mtgjsonV4Id;
    private string $multiverseId;
    private string $scryfallId;
    private string $scryfallOracleId;
    private string $scryfallIllustrationId;
    private string $tcgplayerProductId;

    public function __construct(
        string $cardKingdomFoilId,
        string $cardKingdomId,
        string $mcmId,
        string $mcmMetaId,
        string $mtgArenaId,
        string $mtgoFoilId,
        string $mtgoId,
        string $mtgjsonV4Id,
        string $multiverseId,
        string $scryfallId,
        string $scryfallOracleId,
        string $scryfallIllustrationId,
        string $tcgplayerProductId
    ) {
        $this->cardKingdomFoilId      = $cardKingdomFoilId;
        $this->cardKingdomId          = $cardKingdomId;
        $this->mcmId                  = $mcmId;
        $this->mcmMetaId              = $mcmMetaId;
        $this->mtgArenaId             = $mtgArenaId;
        $this->mtgoFoilId             = $mtgoFoilId;
        $this->mtgoId                 = $mtgoId;
        $this->mtgjsonV4Id            = $mtgjsonV4Id;
        $this->multiverseId           = $multiverseId;
        $this->scryfallId             = $scryfallId;
        $this->scryfallOracleId       = $scryfallOracleId;
        $this->scryfallIllustrationId = $scryfallIllustrationId;
        $this->tcgplayerProductId     = $tcgplayerProductId;
    }

    public function getCardKingdomFoilId(): string
    {
        return $this->cardKingdomFoilId;
    }

    public function getCardKingdomId(): string
    {
        return $this->cardKingdomId;
    }

    public function getMcmId(): string
    {
        return $this->mcmId;
    }

    public function getMcmMetaId(): string
    {
        return $this->mcmMetaId;
    }

    public function getMtgArenaId(): string
    {
        return $this->mtgArenaId;
    }

    public function getMtgoFoilId(): string
    {
        return $this->mtgoFoilId;
    }

    public function getMtgoId(): string
    {
        return $this->mtgoId;
    }

    public function getMtgjsonV4Id(): string
    {
        return $this->mtgjsonV4Id;
    }

    public function getMultiverseId(): string
    {
        return $this->multiverseId;
    }

    public function getScryfallId(): string
    {
        return $this->scryfallId;
    }

    public function getScryfallOracleId(): string
    {
        return $this->scryfallOracleId;
    }

    public function getScryfallIllustrationId(): string
    {
        return $this->scryfallIllustrationId;
    }

    public function getTcgplayerProductId(): string
    {
        return $this->tcgplayerProductId;
    }
}

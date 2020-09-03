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
 * Class Identifiers
 *
 * @author Romain Cottard
 */
final class Identifiers implements \JsonSerializable
{
    use MtgJsonSerializableTrait;

    /** @var string $cardKingdomFoilId */
    private $cardKingdomFoilId;

    /** @var string $cardKingdomId */
    private $cardKingdomId;

    /** @var string $mcmId */
    private $mcmId;

    /** @var string $mcmMetaId */
    private $mcmMetaId;

    /** @var string $mtgArenaId */
    private $mtgArenaId;

    /** @var string $mtgoFoilId */
    private $mtgoFoilId;

    /** @var string $mtgoId */
    private $mtgoId;

    /** @var string $mtgjsonV4Id */
    private $mtgjsonV4Id;

    /** @var string $multiverseId */
    private $multiverseId;

    /** @var string $scryfallId */
    private $scryfallId;

    /** @var string $scryfallOracleId */
    private $scryfallOracleId;

    /** @var string $scryfallIllustrationId */
    private $scryfallIllustrationId;

    /** @var string $tcgplayerProductId */
    private $tcgplayerProductId;

    /**
     * Identifiers constructor.
     *
     * @param string $cardKingdomFoilId
     * @param string $cardKingdomId
     * @param string $mcmId
     * @param string $mcmMetaId
     * @param string $mtgArenaId
     * @param string $mtgoFoilId
     * @param string $mtgoId
     * @param string $mtgjsonV4Id
     * @param string $multiverseId
     * @param string $scryfallId
     * @param string $scryfallOracleId
     * @param string $scryfallIllustrationId
     * @param string $tcgplayerProductId
     */
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

    /**
     * @return string
     */
    public function getCardKingdomFoilId(): string
    {
        return $this->cardKingdomFoilId;
    }

    /**
     * @return string
     */
    public function getCardKingdomId(): string
    {
        return $this->cardKingdomId;
    }

    /**
     * @return string
     */
    public function getMcmId(): string
    {
        return $this->mcmId;
    }

    /**
     * @return string
     */
    public function getMcmMetaId(): string
    {
        return $this->mcmMetaId;
    }

    /**
     * @return string
     */
    public function getMtgArenaId(): string
    {
        return $this->mtgArenaId;
    }

    /**
     * @return string
     */
    public function getMtgoFoilId(): string
    {
        return $this->mtgoFoilId;
    }

    /**
     * @return string
     */
    public function getMtgoId(): string
    {
        return $this->mtgoId;
    }

    /**
     * @return string
     */
    public function getMtgjsonV4Id(): string
    {
        return $this->mtgjsonV4Id;
    }

    /**
     * @return string
     */
    public function getMultiverseId(): string
    {
        return $this->multiverseId;
    }

    /**
     * @return string
     */
    public function getScryfallId(): string
    {
        return $this->scryfallId;
    }

    /**
     * @return string
     */
    public function getScryfallOracleId(): string
    {
        return $this->scryfallOracleId;
    }

    /**
     * @return string
     */
    public function getScryfallIllustrationId(): string
    {
        return $this->scryfallIllustrationId;
    }

    /**
     * @return string
     */
    public function getTcgplayerProductId(): string
    {
        return $this->tcgplayerProductId;
    }
}

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
 * Class Set
 *
 * @author Romain Cottard
 */
final class Set implements \JsonSerializable
{
    use MtgJsonSerializableTrait;

    /** @var int */
    private $baseSetSize;

    /** @var int */
    private $totalSetSize;

    /** @var string */
    private $code;

    /** @var string */
    private $name;

    /** @var string */
    private $type;

    /** @var string */
    private $releaseDate;

    /** @var bool */
    private $isFoilOnly;

    /** @var bool */
    private $isOnlineOnly;

    /** @var bool */
    private $isPaperOnly;

    /** @var string|null */
    private $block;

    /**  @var Booster */
    private $boosters;

    /** @var Card[] */
    private $cards;

    /** @var string|null */
    private $codeV3;

    /** @var string */
    private $keyruneCode;

    /** @var string|null */
    private $parentCode;

    /** @var Translations */
    private $translation;

    /** @var int */
    private $mcmId;

    /** @var string|null */
    private $mcmName;

    /** @var string|null */
    private $mtgoCode;

    /** @var int */
    private $tcgplayerGroupId;

    /** @var CardToken[] */
    private $tokens;

    /** @var bool */
    private $isPartialPreview;

    /** @var bool */
    private $isNonFoilOnly;

    /** @var bool */
    private $isForeignOnly;

    /**
     * Set constructor.
     *
     * @param int $baseSetSize
     * @param int $totalSetSize
     * @param string $code
     * @param string $name
     * @param string $type
     * @param string $releaseDate
     * @param string|null $block
     * @param Booster $boosters
     * @param CardToken[] $tokens
     * @param Card[] $cards
     * @param string|null $codeV3
     * @param string $keyruneCode
     * @param string|null $parentCode
     * @param Translations $translation
     * @param int $mcmId
     * @param string|null $mcmName
     * @param string|null $mtgoCode
     * @param int $tcgplayerGroupId
     * @param bool $isPartialPreview
     * @param bool $isFoilOnly
     * @param bool $isNonFoilOnly
     * @param bool $isOnlineOnly
     * @param bool $isPaperOnly
     * @param bool $isForeignOnly
     */
    public function __construct(
        int $baseSetSize,
        int $totalSetSize,
        string $code,
        string $name,
        string $type,
        string $releaseDate,
        ?string $block,
        Booster $boosters,
        iterable $tokens,
        iterable $cards,
        ?string $codeV3,
        string $keyruneCode,
        ?string $parentCode,
        Translations $translation,
        int $mcmId,
        ?string $mcmName,
        ?string $mtgoCode,
        int $tcgplayerGroupId,
        bool $isPartialPreview,
        bool $isFoilOnly,
        bool $isNonFoilOnly,
        bool $isOnlineOnly,
        bool $isPaperOnly,
        bool $isForeignOnly
    ) {
        $this->baseSetSize      = $baseSetSize;
        $this->totalSetSize     = $totalSetSize;

        $this->code             = $code;
        $this->codeV3           = $codeV3;
        $this->keyruneCode      = $keyruneCode;
        $this->parentCode       = $parentCode;

        $this->name             = $name;
        $this->type             = $type;
        $this->block            = $block;
        $this->translation      = $translation;
        $this->releaseDate      = $releaseDate;

        $this->boosters         = $boosters;
        $this->tokens           = $tokens;

        $this->cards            = $cards;

        $this->mcmId            = $mcmId;
        $this->mcmName          = $mcmName;
        $this->mtgoCode         = $mtgoCode;
        $this->tcgplayerGroupId = $tcgplayerGroupId;

        $this->isPartialPreview = $isPartialPreview;
        $this->isFoilOnly       = $isFoilOnly;
        $this->isNonFoilOnly    = $isNonFoilOnly;
        $this->isOnlineOnly     = $isOnlineOnly;
        $this->isPaperOnly      = $isPaperOnly;
        $this->isForeignOnly    = $isForeignOnly;
    }

    /**
     * @return int
     */
    public function getBaseSetSize(): int
    {
        return $this->baseSetSize;
    }

    /**
     * @return int
     */
    public function getTotalSetSize(): int
    {
        return $this->totalSetSize;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getReleaseDate(): string
    {
        return $this->releaseDate;
    }

    /**
     * @return bool
     */
    public function isFoilOnly(): bool
    {
        return $this->isFoilOnly;
    }

    /**
     * @return bool
     */
    public function isOnlineOnly(): bool
    {
        return $this->isOnlineOnly;
    }

    /**
     * @return bool
     */
    public function isPaperOnly(): bool
    {
        return $this->isPaperOnly;
    }

    /**
     * @return string|null
     */
    public function getBlock(): ?string
    {
        return $this->block;
    }

    /**
     * @return Booster
     */
    public function getBoosters(): Booster
    {
        return $this->boosters;
    }

    /**
     * @param string|null $sort
     * @return  Card[]
     */
    public function getCards(?string $sort = null): iterable
    {
        switch ($sort) {
            case 'name':
                $sortFunction = function (Card $cardA, Card $cardB) {
                    return strcmp($cardA->getName(), $cardB->getName());
                };
                break;
            case 'number':
                $sortFunction = function (Card $cardA, Card $cardB) {
                    return ((int) $cardA->getNumber() <=> (int) $cardB->getNumber());
                };
                break;
            default:
                return $this->cards;
        }

        $cards = $this->cards;

        usort($cards, $sortFunction);

        return $cards;
    }

    /**
     * @return string|null
     */
    public function getCodeV3(): ?string
    {
        return $this->codeV3;
    }

    /**
     * @return string
     */
    public function getKeyruneCode(): string
    {
        return $this->keyruneCode;
    }

    /**
     * @return string|null
     */
    public function getParentCode(): ?string
    {
        return $this->parentCode;
    }

    /**
     * @return Translations
     */
    public function getTranslation(): Translations
    {
        return $this->translation;
    }

    /**
     * @return int
     */
    public function getMcmId(): int
    {
        return $this->mcmId;
    }

    /**
     * @return string|null
     */
    public function getMcmName(): ?string
    {
        return $this->mcmName;
    }

    /**
     * @return string|null
     */
    public function getMtgoCode(): ?string
    {
        return $this->mtgoCode;
    }

    /**
     * @return int
     */
    public function getTcgplayerGroupId(): int
    {
        return $this->tcgplayerGroupId;
    }

    /**
     * @return CardToken[]
     */
    public function getTokens(): iterable
    {
        return $this->tokens;
    }

    /**
     * @return bool
     */
    public function isPartialPreview(): bool
    {
        return $this->isPartialPreview;
    }

    /**
     * @return bool
     */
    public function isNonFoilOnly(): bool
    {
        return $this->isNonFoilOnly;
    }

    /**
     * @return bool
     */
    public function isForeignOnly(): bool
    {
        return $this->isForeignOnly;
    }
}

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

    private int $baseSetSize;
    private int $totalSetSize;
    private string $code;
    private string $name;
    private string $type;
    private string $releaseDate;
    private bool $isFoilOnly;
    private bool $isOnlineOnly;
    private bool $isPaperOnly;
    private ?string $block;
    private Booster $boosters;
    private ?string $codeV3;
    private string $keyruneCode;
    private ?string $parentCode;
    private Translations $translation;
    private int $mcmId;
    private ?string $mcmName;
    private ?string $mtgoCode;
    private int $tcgplayerGroupId;
    private bool $isPartialPreview;
    private bool $isNonFoilOnly;
    private bool $isForeignOnly;

    /** @var Card[] */
    private array $cards;

    /** @var CardToken[] */
    private array $tokens;

    /**
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
        array $tokens,
        array $cards,
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

    public function getBaseSetSize(): int
    {
        return $this->baseSetSize;
    }

    public function getTotalSetSize(): int
    {
        return $this->totalSetSize;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getReleaseDate(): string
    {
        return $this->releaseDate;
    }

    public function isFoilOnly(): bool
    {
        return $this->isFoilOnly;
    }

    public function isOnlineOnly(): bool
    {
        return $this->isOnlineOnly;
    }

    public function isPaperOnly(): bool
    {
        return $this->isPaperOnly;
    }

    public function getBlock(): ?string
    {
        return $this->block;
    }

    public function getBoosters(): Booster
    {
        return $this->boosters;
    }

    /**
     * @return  Card[]
     */
    public function getCards(?string $sort = null): array
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

    public function getCodeV3(): ?string
    {
        return $this->codeV3;
    }

    public function getKeyruneCode(): string
    {
        return $this->keyruneCode;
    }

    public function getParentCode(): ?string
    {
        return $this->parentCode;
    }

    public function getTranslation(): Translations
    {
        return $this->translation;
    }

    public function getMcmId(): int
    {
        return $this->mcmId;
    }

    public function getMcmName(): ?string
    {
        return $this->mcmName;
    }

    public function getMtgoCode(): ?string
    {
        return $this->mtgoCode;
    }

    public function getTcgplayerGroupId(): int
    {
        return $this->tcgplayerGroupId;
    }

    /**
     * @return CardToken[]
     */
    public function getTokens(): array
    {
        return $this->tokens;
    }

    public function isPartialPreview(): bool
    {
        return $this->isPartialPreview;
    }

    public function isNonFoilOnly(): bool
    {
        return $this->isNonFoilOnly;
    }

    public function isForeignOnly(): bool
    {
        return $this->isForeignOnly;
    }
}

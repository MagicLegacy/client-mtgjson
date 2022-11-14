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
 * Class Token
 *
 * @author Romain Cottard
 */
final class CardToken implements \JsonSerializable
{
    use MtgJsonSerializableTrait;

    private string $uuid;
    private string $side;
    private string $faceName;
    private string $name;
    private string $asciiName;
    private string $type;
    private string $text;
    private string $loyalty;
    private string $power;
    private string $toughness;
    private string $layout;
    private int $edhrecRank;
    private Identifiers $identifiers;
    private string $setCode;
    private string $number;
    private string $artist;
    private string $flavorText;
    private string $borderColor;
    private string $frameVersion;
    private string $watermark;
    private bool $hasFoil;
    private bool $hasNonFoil;
    private bool $isFullArt;
    private bool $isOnlineOnly;
    private bool $isPromo;
    private bool $isReprint;

    /** @var string[] $colorIdentity */
    private array $colorIdentity;

    /** @var string[] $colorIndicator */
    private array $colorIndicator;

    /** @var string[] $colors */
    private array $colors;

    /** @var string[] $subTypes */
    private array $subTypes;

    /** @var string[] $superTypes */
    private array $superTypes;

    /** @var string[] $types */
    private array $types;

    /** @var string[] $otherFaceIds */
    private array $otherFaceIds;

    /** @var string[] $frameEffects */
    private array $frameEffects;

    /** @var string[] $keywords */
    private array $keywords;

    /** @var string[] $availability */
    private array $availability;

    /** @var string[] $promoTypes */
    private array $promoTypes;


    /**
     * Token constructor.
     *
     * @param string $uuid
     * @param string $side
     * @param string $faceName
     * @param string $name
     * @param string $asciiName
     * @param string[] $colorIdentity
     * @param string[] $colorIndicator
     * @param string[] $colors
     * @param string[] $subTypes
     * @param string[] $superTypes
     * @param string $type
     * @param string[] $types
     * @param string $text
     * @param string $loyalty
     * @param string $power
     * @param string $toughness
     * @param string $layout
     * @param int $edhrecRank
     * @param Identifiers $identifiers
     * @param string[] $otherFaceIds
     * @param string $setCode
     * @param string $number
     * @param string $artist
     * @param string $flavorText
     * @param string $borderColor
     * @param string[] $frameEffects
     * @param string $frameVersion
     * @param string $watermark
     * @param string[] $keywords
     * @param string[] $availability
     * @param bool $hasFoil
     * @param bool $hasNonFoil
     * @param bool $isFullArt
     * @param bool $isOnlineOnly
     * @param bool $isPromo
     * @param bool $isReprint
     * @param string[] $promoTypes
     */
    public function __construct(
        string $uuid,
        string $side,
        string $faceName,
        string $name,
        string $asciiName,
        array $colorIdentity,
        array $colorIndicator,
        array $colors,
        array $subTypes,
        array $superTypes,
        string $type,
        array $types,
        string $text,
        string $loyalty,
        string $power,
        string $toughness,
        string $layout,
        int $edhrecRank,
        Identifiers $identifiers,
        array $otherFaceIds,
        string $setCode,
        string $number,
        string $artist,
        string $flavorText,
        string $borderColor,
        array $frameEffects,
        string $frameVersion,
        string $watermark,
        array $keywords,
        array $availability,
        bool $hasFoil,
        bool $hasNonFoil,
        bool $isFullArt,
        bool $isOnlineOnly,
        bool $isPromo,
        bool $isReprint,
        array $promoTypes
    ) {
        $this->uuid           = $uuid;
        $this->side           = $side;
        $this->faceName       = $faceName;
        $this->name           = $name;
        $this->asciiName      = $asciiName;
        $this->colorIdentity  = $colorIdentity;
        $this->colorIndicator = $colorIndicator;
        $this->colors         = $colors;
        $this->subTypes       = $subTypes;
        $this->superTypes     = $superTypes;
        $this->type           = $type;
        $this->types          = $types;
        $this->text           = $text;
        $this->loyalty        = $loyalty;
        $this->power          = $power;
        $this->toughness      = $toughness;
        $this->layout         = $layout;
        $this->edhrecRank     = $edhrecRank;
        $this->identifiers    = $identifiers;
        $this->otherFaceIds   = $otherFaceIds;
        $this->setCode        = $setCode;
        $this->number         = $number;
        $this->artist         = $artist;
        $this->flavorText     = $flavorText;
        $this->borderColor    = $borderColor;
        $this->frameEffects   = $frameEffects;
        $this->frameVersion   = $frameVersion;
        $this->watermark      = $watermark;
        $this->keywords       = $keywords;
        $this->availability   = $availability;
        $this->hasFoil        = $hasFoil;
        $this->hasNonFoil     = $hasNonFoil;
        $this->isFullArt      = $isFullArt;
        $this->isOnlineOnly   = $isOnlineOnly;
        $this->isPromo        = $isPromo;
        $this->isReprint      = $isReprint;
        $this->promoTypes     = $promoTypes;
    }

    public function getUuid(): string
    {
        return $this->uuid;
    }

    public function getSide(): string
    {
        return $this->side;
    }

    public function getFaceName(): string
    {
        return $this->faceName;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAsciiName(): string
    {
        return $this->asciiName;
    }

    /**
     * @return string[]
     */
    public function getColorIdentity(): array
    {
        return $this->colorIdentity;
    }

    /**
     * @return string[]
     */
    public function getColorIndicator(): array
    {
        return $this->colorIndicator;
    }

    /**
     * @return string[]
     */
    public function getColors(): array
    {
        return $this->colors;
    }

    /**
     * @return string[]
     */
    public function getSubTypes(): array
    {
        return $this->subTypes;
    }

    /**
     * @return string[]
     */
    public function getSuperTypes(): array
    {
        return $this->superTypes;
    }

    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string[]
     */
    public function getTypes(): array
    {
        return $this->types;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function getLoyalty(): string
    {
        return $this->loyalty;
    }

    public function getPower(): string
    {
        return $this->power;
    }

    public function getToughness(): string
    {
        return $this->toughness;
    }

    public function getLayout(): string
    {
        return $this->layout;
    }

    public function getEdhrecRank(): int
    {
        return $this->edhrecRank;
    }

    public function getIdentifiers(): Identifiers
    {
        return $this->identifiers;
    }

    /**
     * @return string[]
     */
    public function getOtherFaceIds(): array
    {
        return $this->otherFaceIds;
    }

    public function getSetCode(): string
    {
        return $this->setCode;
    }

    public function getNumber(): string
    {
        return $this->number;
    }

    public function getArtist(): string
    {
        return $this->artist;
    }

    public function getFlavorText(): string
    {
        return $this->flavorText;
    }

    public function getBorderColor(): string
    {
        return $this->borderColor;
    }

    /**
     * @return string[]
     */
    public function getFrameEffects(): array
    {
        return $this->frameEffects;
    }

    public function getFrameVersion(): string
    {
        return $this->frameVersion;
    }

    public function getWatermark(): string
    {
        return $this->watermark;
    }

    /**
     * @return string[]
     */
    public function getKeywords(): array
    {
        return $this->keywords;
    }

    /**
     * @return string[]
     */
    public function getAvailability(): array
    {
        return $this->availability;
    }

    public function hasFoil(): bool
    {
        return $this->hasFoil;
    }

    public function hasNonFoil(): bool
    {
        return $this->hasNonFoil;
    }

    public function isFullArt(): bool
    {
        return $this->isFullArt;
    }

    public function isOnlineOnly(): bool
    {
        return $this->isOnlineOnly;
    }

    public function isPromo(): bool
    {
        return $this->isPromo;
    }

    public function isReprint(): bool
    {
        return $this->isReprint;
    }

    /**
     * @return string[]
     */
    public function getPromoTypes(): array
    {
        return $this->promoTypes;
    }
}

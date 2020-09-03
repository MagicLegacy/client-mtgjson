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

    /** @var string $uuid */
    private $uuid;

    /** @var string $side */
    private $side;

    /** @var string $faceName */
    private $faceName;

    /** @var string $name */
    private $name;

    /** @var string $asciiName */
    private $asciiName;

    /** @var array $colorIdentity */
    private $colorIdentity;

    /** @var array $colorIndicator */
    private $colorIndicator;

    /** @var array $colors */
    private $colors;

    /** @var array $subTypes */
    private $subTypes;

    /** @var array $superTypes */
    private $superTypes;

    /** @var string $type */
    private $type;

    /** @var array $types */
    private $types;

    /** @var string $text */
    private $text;

    /** @var string $loyalty */
    private $loyalty;

    /** @var string $power */
    private $power;

    /** @var string $toughness */
    private $toughness;

    /** @var string $layout */
    private $layout;

    /** @var int $edhrecRank */
    private $edhrecRank;

    /** @var Identifiers $identifiers */
    private $identifiers;

    /** @var array $otherFaceIds */
    private $otherFaceIds;

    /** @var string $setCode */
    private $setCode;

    /** @var string $number */
    private $number;

    /** @var string $artist */
    private $artist;

    /** @var string $flavorText */
    private $flavorText;

    /** @var string $borderColor */
    private $borderColor;

    /** @var array $frameEffects */
    private $frameEffects;

    /** @var string $frameVersion */
    private $frameVersion;

    /** @var string $watermark */
    private $watermark;

    /** @var array $keywords */
    private $keywords;

    /** @var array $availability */
    private $availability;

    /** @var bool $hasFoil */
    private $hasFoil;

    /** @var bool $hasNonFoil */
    private $hasNonFoil;

    /** @var bool $isFullArt */
    private $isFullArt;

    /** @var bool $isOnlineOnly */
    private $isOnlineOnly;

    /** @var bool $isPromo */
    private $isPromo;

    /** @var bool $isReprint */
    private $isReprint;

    /** @var array $promoTypes */
    private $promoTypes;


    /**
     * Token constructor.
     *
     * @param string $uuid
     * @param string $side
     * @param string $faceName
     * @param string $name
     * @param string $asciiName
     * @param array $colorIdentity
     * @param array $colorIndicator
     * @param array $colors
     * @param array $subTypes
     * @param array $superTypes
     * @param string $type
     * @param array $types
     * @param string $text
     * @param string $loyalty
     * @param string $power
     * @param string $toughness
     * @param string $layout
     * @param int $edhrecRank
     * @param Identifiers $identifiers
     * @param array $otherFaceIds
     * @param string $setCode
     * @param string $number
     * @param string $artist
     * @param string $flavorText
     * @param string $borderColor
     * @param array $frameEffects
     * @param string $frameVersion
     * @param string $watermark
     * @param array $keywords
     * @param array $availability
     * @param bool $hasFoil
     * @param bool $hasNonFoil
     * @param bool $isFullArt
     * @param bool $isOnlineOnly
     * @param bool $isPromo
     * @param bool $isReprint
     * @param array $promoTypes
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

    /**
     * @return string
     */
    public function getUuid(): string
    {
        return $this->uuid;
    }

    /**
     * @return string
     */
    public function getSide(): string
    {
        return $this->side;
    }

    /**
     * @return string
     */
    public function getFaceName(): string
    {
        return $this->faceName;
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
    public function getAsciiName(): string
    {
        return $this->asciiName;
    }

    /**
     * @return array
     */
    public function getColorIdentity(): array
    {
        return $this->colorIdentity;
    }

    /**
     * @return array
     */
    public function getColorIndicator(): array
    {
        return $this->colorIndicator;
    }

    /**
     * @return array
     */
    public function getColors(): array
    {
        return $this->colors;
    }

    /**
     * @return array
     */
    public function getSubTypes(): array
    {
        return $this->subTypes;
    }

    /**
     * @return array
     */
    public function getSuperTypes(): array
    {
        return $this->superTypes;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return array
     */
    public function getTypes(): array
    {
        return $this->types;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @return string
     */
    public function getLoyalty(): string
    {
        return $this->loyalty;
    }

    /**
     * @return string
     */
    public function getPower(): string
    {
        return $this->power;
    }

    /**
     * @return string
     */
    public function getToughness(): string
    {
        return $this->toughness;
    }

    /**
     * @return string
     */
    public function getLayout(): string
    {
        return $this->layout;
    }

    /**
     * @return int
     */
    public function getEdhrecRank(): int
    {
        return $this->edhrecRank;
    }

    /**
     * @return Identifiers
     */
    public function getIdentifiers(): Identifiers
    {
        return $this->identifiers;
    }

    /**
     * @return array
     */
    public function getOtherFaceIds(): array
    {
        return $this->otherFaceIds;
    }

    /**
     * @return string
     */
    public function getSetCode(): string
    {
        return $this->setCode;
    }

    /**
     * @return string
     */
    public function getNumber(): string
    {
        return $this->number;
    }

    /**
     * @return string
     */
    public function getArtist(): string
    {
        return $this->artist;
    }

    /**
     * @return string
     */
    public function getFlavorText(): string
    {
        return $this->flavorText;
    }

    /**
     * @return string
     */
    public function getBorderColor(): string
    {
        return $this->borderColor;
    }

    /**
     * @return array
     */
    public function getFrameEffects(): array
    {
        return $this->frameEffects;
    }

    /**
     * @return string
     */
    public function getFrameVersion(): string
    {
        return $this->frameVersion;
    }

    /**
     * @return string
     */
    public function getWatermark(): string
    {
        return $this->watermark;
    }

    /**
     * @return array
     */
    public function getKeywords(): array
    {
        return $this->keywords;
    }

    /**
     * @return array
     */
    public function getAvailability(): array
    {
        return $this->availability;
    }

    /**
     * @return bool
     */
    public function hasFoil(): bool
    {
        return $this->hasFoil;
    }

    /**
     * @return bool
     */
    public function hasNonFoil(): bool
    {
        return $this->hasNonFoil;
    }

    /**
     * @return bool
     */
    public function isFullArt(): bool
    {
        return $this->isFullArt;
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
    public function isPromo(): bool
    {
        return $this->isPromo;
    }

    /**
     * @return bool
     */
    public function isReprint(): bool
    {
        return $this->isReprint;
    }

    /**
     * @return array
     */
    public function getPromoTypes(): array
    {
        return $this->promoTypes;
    }
}

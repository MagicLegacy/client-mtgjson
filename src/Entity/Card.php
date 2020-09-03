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
 * Class Card
 *
 * @author Romain Cottard
 */
final class Card implements \JsonSerializable
{
    use MtgJsonSerializableTrait;

    /** @var string $uuid */
    private $uuid;

    /** @var string $manaCost */
    private $manaCost;

    /** @var float $convertedManaCost */
    private $convertedManaCost;

    /** @var float $faceConvertedManaCost */
    private $faceConvertedManaCost;

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

    /** @var string $hand */
    private $hand;

    /** @var string $life */
    private $life;

    /** @var bool $hasAlternativeDeckLimit */
    private $hasAlternativeDeckLimit;

    /** @var LeadershipSkills $leadershipSkills */
    private $leadershipSkills;

    /** @var Legalities $legalities */
    private $legalities;

    /** @var string $layout */
    private $layout;

    /** @var ForeignData[] $foreignData */
    private $foreignData;

    /** @var array $printings */
    private $printings;

    /** @var PurchaseUrls $purchaseUrls */
    private $purchaseUrls;

    /** @var bool $isReserved */
    private $isReserved;

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

    /** @var string $rarity */
    private $rarity;

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

    /** @var array $variations */
    private $variations;

    /** @var array $keywords */
    private $keywords;

    /** @var string $originalText */
    private $originalText;

    /** @var string $originalType */
    private $originalType;

    /** @var array $rulings */
    private $rulings;

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

    /** @var bool $isAlternative */
    private $isAlternative;

    /** @var bool $hasContentWarning */
    private $hasContentWarning;

    /** @var bool $isOversized */
    private $isOversized;

    /** @var bool $isStarter */
    private $isStarter;

    /** @var bool $isStorySpotlight */
    private $isStorySpotlight;

    /** @var bool $isTextless */
    private $isTextless;

    /** @var bool $isTimeshifted */
    private $isTimeshifted;

    /** @var array $promoTypes */
    private $promoTypes;

    /** @var int $count */
    private $count;

    /** @var string $duelDeck */
    private $duelDeck;


    /**
     * Class constructor.
     *
     * @param string $uuid
     * @param string $manaCost
     * @param float $convertedManaCost
     * @param float $faceConvertedManaCost
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
     * @param string $hand
     * @param string $life
     * @param bool $hasAlternativeDeckLimit
     * @param LeadershipSkills $leadershipSkills
     * @param Legalities $legalities
     * @param string $layout
     * @param ForeignData[] $foreignData
     * @param array $printings
     * @param PurchaseUrls $purchaseUrls
     * @param bool $isReserved
     * @param int $edhrecRank
     * @param Identifiers $identifiers
     * @param array $otherFaceIds
     * @param string $setCode
     * @param string $number
     * @param string $rarity
     * @param string $artist
     * @param string $flavorText
     * @param string $borderColor
     * @param array $frameEffects
     * @param string $frameVersion
     * @param string $watermark
     * @param array $variations
     * @param array $keywords
     * @param string $originalText
     * @param string $originalType
     * @param array $rulings
     * @param array $availability
     * @param bool $hasFoil
     * @param bool $hasNonFoil
     * @param bool $isFullArt
     * @param bool $isOnlineOnly
     * @param bool $isPromo
     * @param bool $isReprint
     * @param bool $isAlternative
     * @param bool $hasContentWarning
     * @param bool $isOversized
     * @param bool $isStarter
     * @param bool $isStorySpotlight
     * @param bool $isTextless
     * @param bool $isTimeshifted
     * @param array $promoTypes
     * @param int $count
     * @param string $duelDeck
     */
    public function __construct(
        string $uuid,
        string $manaCost,
        float $convertedManaCost,
        float $faceConvertedManaCost,
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
        string $hand,
        string $life,
        bool $hasAlternativeDeckLimit,
        LeadershipSkills $leadershipSkills,
        Legalities $legalities,
        string $layout,
        iterable $foreignData,
        array $printings,
        PurchaseUrls $purchaseUrls,
        bool $isReserved,
        int $edhrecRank,
        Identifiers $identifiers,
        array $otherFaceIds,
        string $setCode,
        string $number,
        string $rarity,
        string $artist,
        string $flavorText,
        string $borderColor,
        array $frameEffects,
        string $frameVersion,
        string $watermark,
        array $variations,
        array $keywords,
        string $originalText,
        string $originalType,
        array $rulings,
        array $availability,
        bool $hasFoil,
        bool $hasNonFoil,
        bool $isFullArt,
        bool $isOnlineOnly,
        bool $isPromo,
        bool $isReprint,
        bool $isAlternative,
        bool $hasContentWarning,
        bool $isOversized,
        bool $isStarter,
        bool $isStorySpotlight,
        bool $isTextless,
        bool $isTimeshifted,
        array $promoTypes,
        int $count,
        string $duelDeck
    ) {
        $this->uuid = $uuid;
        $this->manaCost = $manaCost;
        $this->convertedManaCost = $convertedManaCost;
        $this->faceConvertedManaCost = $faceConvertedManaCost;
        $this->side = $side;
        $this->faceName = $faceName;
        $this->name = $name;
        $this->asciiName = $asciiName;
        $this->colorIdentity = $colorIdentity;
        $this->colorIndicator = $colorIndicator;
        $this->colors = $colors;
        $this->subTypes = $subTypes;
        $this->superTypes = $superTypes;
        $this->type = $type;
        $this->types = $types;
        $this->text = $text;
        $this->loyalty = $loyalty;
        $this->power = $power;
        $this->toughness = $toughness;
        $this->hand = $hand;
        $this->life = $life;
        $this->hasAlternativeDeckLimit = $hasAlternativeDeckLimit;
        $this->leadershipSkills = $leadershipSkills;
        $this->legalities = $legalities;
        $this->layout = $layout;
        $this->foreignData = $foreignData;
        $this->printings = $printings;
        $this->purchaseUrls = $purchaseUrls;
        $this->isReserved = $isReserved;
        $this->edhrecRank = $edhrecRank;
        $this->identifiers = $identifiers;
        $this->otherFaceIds = $otherFaceIds;
        $this->setCode = $setCode;
        $this->number = $number;
        $this->rarity = $rarity;
        $this->artist = $artist;
        $this->flavorText = $flavorText;
        $this->borderColor = $borderColor;
        $this->frameEffects = $frameEffects;
        $this->frameVersion = $frameVersion;
        $this->watermark = $watermark;
        $this->variations = $variations;
        $this->keywords = $keywords;
        $this->originalText = $originalText;
        $this->originalType = $originalType;
        $this->rulings = $rulings;
        $this->availability = $availability;
        $this->hasFoil = $hasFoil;
        $this->hasNonFoil = $hasNonFoil;
        $this->isFullArt = $isFullArt;
        $this->isOnlineOnly = $isOnlineOnly;
        $this->isPromo = $isPromo;
        $this->isReprint = $isReprint;
        $this->isAlternative = $isAlternative;
        $this->hasContentWarning = $hasContentWarning;
        $this->isOversized = $isOversized;
        $this->isStarter = $isStarter;
        $this->isStorySpotlight = $isStorySpotlight;
        $this->isTextless = $isTextless;
        $this->isTimeshifted = $isTimeshifted;
        $this->promoTypes = $promoTypes;
        $this->count = $count;
        $this->duelDeck = $duelDeck;
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
    public function getManaCost(): string
    {
        return $this->manaCost;
    }

    /**
     * @return float
     */
    public function getConvertedManaCost(): float
    {
        return $this->convertedManaCost;
    }

    /**
     * @return float
     */
    public function getFaceConvertedManaCost(): float
    {
        return $this->faceConvertedManaCost;
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
    public function getHand(): string
    {
        return $this->hand;
    }

    /**
     * @return string
     */
    public function getLife(): string
    {
        return $this->life;
    }

    /**
     * @return bool
     */
    public function hasAlternativeDeckLimit(): bool
    {
        return $this->hasAlternativeDeckLimit;
    }

    /**
     * @return LeadershipSkills
     */
    public function getLeadershipSkills(): LeadershipSkills
    {
        return $this->leadershipSkills;
    }

    /**
     * @return Legalities
     */
    public function getLegalities(): Legalities
    {
        return $this->legalities;
    }

    /**
     * @return string
     */
    public function getLayout(): string
    {
        return $this->layout;
    }

    /**
     * @return ForeignData[]
     */
    public function getAllForeignData(): iterable
    {
        return $this->foreignData;
    }

    /**
     * @param string $language
     * @return ForeignData|null
     */
    public function getForeignData(string $language): ?ForeignData
    {
        return $this->foreignData[$language] ?? null;
    }

    /**
     * @return array
     */
    public function getPrintings(): array
    {
        return $this->printings;
    }

    /**
     * @return PurchaseUrls
     */
    public function getPurchaseUrls(): PurchaseUrls
    {
        return $this->purchaseUrls;
    }

    /**
     * @return bool
     */
    public function isReserved(): bool
    {
        return $this->isReserved;
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
    public function getRarity(): string
    {
        return $this->rarity;
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
    public function getVariations(): array
    {
        return $this->variations;
    }

    /**
     * @return array
     */
    public function getKeywords(): array
    {
        return $this->keywords;
    }

    /**
     * @return string
     */
    public function getOriginalText(): string
    {
        return $this->originalText;
    }

    /**
     * @return string
     */
    public function getOriginalType(): string
    {
        return $this->originalType;
    }

    /**
     * @return array
     */
    public function getRulings(): array
    {
        return $this->rulings;
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
     * @return bool
     */
    public function isAlternative(): bool
    {
        return $this->isAlternative;
    }

    /**
     * @return bool
     */
    public function hasContentWarning(): bool
    {
        return $this->hasContentWarning;
    }

    /**
     * @return bool
     */
    public function isOversized(): bool
    {
        return $this->isOversized;
    }

    /**
     * @return bool
     */
    public function isStarter(): bool
    {
        return $this->isStarter;
    }

    /**
     * @return bool
     */
    public function isStorySpotlight(): bool
    {
        return $this->isStorySpotlight;
    }

    /**
     * @return bool
     */
    public function isTextless(): bool
    {
        return $this->isTextless;
    }

    /**
     * @return bool
     */
    public function isTimeshifted(): bool
    {
        return $this->isTimeshifted;
    }

    /**
     * @return array
     */
    public function getPromoTypes(): array
    {
        return $this->promoTypes;
    }

    /**
     * @return int
     */
    public function getCount(): int
    {
        return $this->count;
    }

    /**
     * @return string
     */
    public function getDuelDeck(): string
    {
        return $this->duelDeck;
    }
}

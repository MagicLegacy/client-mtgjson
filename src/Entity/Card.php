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
 * Class Card
 *
 * @author Romain Cottard
 */
final class Card implements \JsonSerializable
{
    use JsonSerializableTrait;

    private string $uuid;
    private string $manaCost;
    private float $convertedManaCost;
    private float $faceConvertedManaCost;
    private string $side;
    private string $faceName;
    private string $name;
    private string $asciiName;
    private string $text;
    private string $loyalty;
    private string $power;
    private string $toughness;
    private string $hand;
    private string $life;
    private bool $hasAlternativeDeckLimit;
    private LeadershipSkills $leadershipSkills;
    private Legalities $legalities;
    private string $layout;
    private PurchaseUrls $purchaseUrls;
    private bool $isReserved;
    private int $edhrecRank;
    private Identifiers $identifiers;
    private string $type;
    private string $setCode;
    private string $number;
    private string $rarity;
    private string $artist;
    private string $flavorText;
    private string $borderColor;
    private string $frameVersion;
    private string $watermark;
    private string $originalText;
    private string $originalType;
    private bool $hasFoil;
    private bool $hasNonFoil;
    private bool $isFullArt;
    private bool $isOnlineOnly;
    private bool $isPromo;
    private bool $isReprint;
    private bool $isAlternative;
    private bool $hasContentWarning;
    private bool $isOversized;
    private bool $isStarter;
    private bool $isStorySpotlight;
    private bool $isTextless;
    private bool $isTimeshifted;
    private int $count;
    private string $duelDeck;

    /** @var string[] $variations */
    private array $variations;

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

    /** @var ForeignData[] $foreignData */
    private array $foreignData;

    /** @var string[] $printings */
    private array $printings;

    /** @var string[] $otherFaceIds */
    private array $otherFaceIds;

    /** @var string[] $frameEffects */
    private array $frameEffects;

    /** @var string[] $keywords */
    private array $keywords;

    /** @var Ruling[] $rulings */
    private array $rulings;

    /** @var string[] $availability */
    private array $availability;

    /** @var string[] $promoTypes */
    private array $promoTypes;


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
     * @param string $hand
     * @param string $life
     * @param bool $hasAlternativeDeckLimit
     * @param LeadershipSkills $leadershipSkills
     * @param Legalities $legalities
     * @param string $layout
     * @param ForeignData[] $foreignData
     * @param string[] $printings
     * @param PurchaseUrls $purchaseUrls
     * @param bool $isReserved
     * @param int $edhrecRank
     * @param Identifiers $identifiers
     * @param string[] $otherFaceIds
     * @param string $setCode
     * @param string $number
     * @param string $rarity
     * @param string $artist
     * @param string $flavorText
     * @param string $borderColor
     * @param string[] $frameEffects
     * @param string $frameVersion
     * @param string $watermark
     * @param string[] $variations
     * @param string[] $keywords
     * @param string $originalText
     * @param string $originalType
     * @param Ruling[] $rulings
     * @param string[] $availability
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
     * @param string[] $promoTypes
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
        array $foreignData,
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

    public function getUuid(): string
    {
        return $this->uuid;
    }

    public function getManaCost(): string
    {
        return $this->manaCost;
    }

    public function getConvertedManaCost(): float
    {
        return $this->convertedManaCost;
    }

    public function getFaceConvertedManaCost(): float
    {
        return $this->faceConvertedManaCost;
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

    public function getHand(): string
    {
        return $this->hand;
    }

    public function getLife(): string
    {
        return $this->life;
    }

    public function hasAlternativeDeckLimit(): bool
    {
        return $this->hasAlternativeDeckLimit;
    }

    public function getLeadershipSkills(): LeadershipSkills
    {
        return $this->leadershipSkills;
    }

    public function getLegalities(): Legalities
    {
        return $this->legalities;
    }

    public function getLayout(): string
    {
        return $this->layout;
    }

    /**
     * @return ForeignData[]
     */
    public function getAllForeignData(): array
    {
        return $this->foreignData;
    }

    public function getForeignData(string $language): ?ForeignData
    {
        return $this->foreignData[$language] ?? null;
    }

    /**
     * @return string[]
     */
    public function getPrintings(): array
    {
        return $this->printings;
    }

    public function getPurchaseUrls(): PurchaseUrls
    {
        return $this->purchaseUrls;
    }

    public function isReserved(): bool
    {
        return $this->isReserved;
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

    public function getRarity(): string
    {
        return $this->rarity;
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
    public function getVariations(): array
    {
        return $this->variations;
    }

    /**
     * @return string[]
     */
    public function getKeywords(): array
    {
        return $this->keywords;
    }

    public function getOriginalText(): string
    {
        return $this->originalText;
    }

    public function getOriginalType(): string
    {
        return $this->originalType;
    }

    /**
     * @return Ruling[]
     */
    public function getRulings(): array
    {
        return $this->rulings;
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

    public function isAlternative(): bool
    {
        return $this->isAlternative;
    }

    public function hasContentWarning(): bool
    {
        return $this->hasContentWarning;
    }

    public function isOversized(): bool
    {
        return $this->isOversized;
    }

    public function isStarter(): bool
    {
        return $this->isStarter;
    }

    public function isStorySpotlight(): bool
    {
        return $this->isStorySpotlight;
    }

    public function isTextless(): bool
    {
        return $this->isTextless;
    }

    public function isTimeshifted(): bool
    {
        return $this->isTimeshifted;
    }

    /**
     * @return string[]
     */
    public function getPromoTypes(): array
    {
        return $this->promoTypes;
    }

    public function getCount(): int
    {
        return $this->count;
    }

    public function getDuelDeck(): string
    {
        return $this->duelDeck;
    }
}

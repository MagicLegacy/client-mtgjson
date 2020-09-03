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
final class CardAtomic implements \JsonSerializable
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

    /** @var array $foreignData */
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

    /** @var Ruling[] $rulings */
    private $rulings;


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
     * @param array $foreignData
     * @param array $printings
     * @param PurchaseUrls $purchaseUrls
     * @param bool $isReserved
     * @param int $edhrecRank
     * @param Identifiers $identifiers
     * @param Ruling[] $rulings
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
        iterable $rulings
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
        $this->rulings = $rulings;
    }

    /**
     * @return Ruling[]
     */
    public function getRulings(): array
    {
        return $this->rulings;
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
    public function getSupertypes(): array
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
     * @return ForeignData
     */
    public function getForeignData(string $language): ForeignData
    {
        return $this->foreignData[$language] ?? new ForeignData('', '', '', '', '', 0, '');
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
}

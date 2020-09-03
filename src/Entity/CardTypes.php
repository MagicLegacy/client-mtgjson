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
 * Class CardTypes
 *
 * @author Romain Cottard
 */
final class CardTypes implements \JsonSerializable
{
    use MtgJsonSerializableTrait;

    /** @var Types $artifact */
    private $artifact;

    /** @var Types $conspiracy */
    private $conspiracy;

    /** @var Types $creature */
    private $creature;

    /** @var Types $enchantment */
    private $enchantment;

    /** @var Types $instant */
    private $instant;

    /** @var Types $land */
    private $land;

    /** @var Types $phenomenon */
    private $phenomenon;

    /** @var Types $plane */
    private $plane;

    /** @var Types $planeswalker */
    private $planeswalker;

    /** @var Types $scheme */
    private $scheme;

    /** @var Types $sorcery */
    private $sorcery;

    /** @var Types $tribal */
    private $tribal;

    /** @var Types $vanguard */
    private $vanguard;

    /**
     * Class constructor.
     *
     * @param Types $artifact
     * @param Types $conspiracy
     * @param Types $creature
     * @param Types $enchantment
     * @param Types $instant
     * @param Types $land
     * @param Types $phenomenon
     * @param Types $plane
     * @param Types $planeswalker
     * @param Types $scheme
     * @param Types $sorcery
     * @param Types $tribal
     * @param Types $vanguard
     */
    public function __construct(
        Types $artifact,
        Types $conspiracy,
        Types $creature,
        Types $enchantment,
        Types $instant,
        Types $land,
        Types $phenomenon,
        Types $plane,
        Types $planeswalker,
        Types $scheme,
        Types $sorcery,
        Types $tribal,
        Types $vanguard
    ) {
        $this->artifact = $artifact;
        $this->conspiracy = $conspiracy;
        $this->creature = $creature;
        $this->enchantment = $enchantment;
        $this->instant = $instant;
        $this->land = $land;
        $this->phenomenon = $phenomenon;
        $this->plane = $plane;
        $this->planeswalker = $planeswalker;
        $this->scheme = $scheme;
        $this->sorcery = $sorcery;
        $this->tribal = $tribal;
        $this->vanguard = $vanguard;
    }

    /**
     * @return Types
     */
    public function getArtifact(): Types
    {
        return $this->artifact;
    }

    /**
     * @return Types
     */
    public function getConspiracy(): Types
    {
        return $this->conspiracy;
    }

    /**
     * @return Types
     */
    public function getCreature(): Types
    {
        return $this->creature;
    }

    /**
     * @return Types
     */
    public function getEnchantment(): Types
    {
        return $this->enchantment;
    }

    /**
     * @return Types
     */
    public function getInstant(): Types
    {
        return $this->instant;
    }

    /**
     * @return Types
     */
    public function getLand(): Types
    {
        return $this->land;
    }

    /**
     * @return Types
     */
    public function getPhenomenon(): Types
    {
        return $this->phenomenon;
    }

    /**
     * @return Types
     */
    public function getPlane(): Types
    {
        return $this->plane;
    }

    /**
     * @return Types
     */
    public function getPlaneswalker(): Types
    {
        return $this->planeswalker;
    }

    /**
     * @return Types
     */
    public function getScheme(): Types
    {
        return $this->scheme;
    }

    /**
     * @return Types
     */
    public function getSorcery(): Types
    {
        return $this->sorcery;
    }

    /**
     * @return Types
     */
    public function getTribal(): Types
    {
        return $this->tribal;
    }

    /**
     * @return Types
     */
    public function getVanguard(): Types
    {
        return $this->vanguard;
    }
}

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

    private Types $artifact;
    private Types $conspiracy;
    private Types $creature;
    private Types $enchantment;
    private Types $instant;
    private Types $land;
    private Types $phenomenon;
    private Types $plane;
    private Types $planeswalker;
    private Types $scheme;
    private Types $sorcery;
    private Types $tribal;
    private Types $vanguard;

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

    public function getArtifact(): Types
    {
        return $this->artifact;
    }

    public function getConspiracy(): Types
    {
        return $this->conspiracy;
    }

    public function getCreature(): Types
    {
        return $this->creature;
    }

    public function getEnchantment(): Types
    {
        return $this->enchantment;
    }

    public function getInstant(): Types
    {
        return $this->instant;
    }

    public function getLand(): Types
    {
        return $this->land;
    }

    public function getPhenomenon(): Types
    {
        return $this->phenomenon;
    }

    public function getPlane(): Types
    {
        return $this->plane;
    }

    public function getPlaneswalker(): Types
    {
        return $this->planeswalker;
    }

    public function getScheme(): Types
    {
        return $this->scheme;
    }

    public function getSorcery(): Types
    {
        return $this->sorcery;
    }

    public function getTribal(): Types
    {
        return $this->tribal;
    }

    public function getVanguard(): Types
    {
        return $this->vanguard;
    }
}

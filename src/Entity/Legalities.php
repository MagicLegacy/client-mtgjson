<?php

/*
 * Copyright (c) Romain Cottard
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace MagicLegacy\Component\MtgJson\Entity;

use MagicLegacy\Component\MtgJson\Enumerator\LegalityEnumerator;
use MagicLegacy\Component\MtgJson\Serializer\MtgJsonSerializableTrait;

/**
 * Class Legalities
 *
 * @author Romain Cottard
 */
final class Legalities implements \JsonSerializable
{
    use MtgJsonSerializableTrait;

    /** @var string */
    private $brawl;

    /** @var string */
    private $commander;

    /** @var string */
    private $duel;

    /** @var string */
    private $future;

    /** @var string */
    private $frontier;

    /** @var string */
    private $legacy;

    /** @var string */
    private $modern;

    /** @var string */
    private $pauper;

    /** @var string */
    private $penny;

    /** @var string */
    private $pioneer;

    /** @var string */
    private $standard;

    /** @var string */
    private $vintage;


    /**
     * Legalities constructor.
     *
     * @param string $brawl
     * @param string $commander
     * @param string $duel
     * @param string $future
     * @param string $frontier
     * @param string $legacy
     * @param string $modern
     * @param string $pauper
     * @param string $penny
     * @param string $pioneer
     * @param string $standard
     * @param string $vintage
     */
    public function __construct(
        string $brawl = LegalityEnumerator::LEGAL,
        string $commander = LegalityEnumerator::LEGAL,
        string $duel = LegalityEnumerator::LEGAL,
        string $future = LegalityEnumerator::LEGAL,
        string $frontier = LegalityEnumerator::LEGAL,
        string $legacy = LegalityEnumerator::LEGAL,
        string $modern = LegalityEnumerator::LEGAL,
        string $pauper = LegalityEnumerator::LEGAL,
        string $penny = LegalityEnumerator::LEGAL,
        string $pioneer = LegalityEnumerator::LEGAL,
        string $standard = LegalityEnumerator::LEGAL,
        string $vintage = LegalityEnumerator::LEGAL
    ) {
        $this->brawl     = $brawl;
        $this->commander = $commander;
        $this->duel      = $duel;
        $this->future    = $future;
        $this->frontier  = $frontier;
        $this->legacy    = $legacy;
        $this->modern    = $modern;
        $this->pauper    = $pauper;
        $this->penny     = $penny;
        $this->pioneer   = $pioneer;
        $this->standard  = $standard;
        $this->vintage   = $vintage;
    }

    /**
     * @return string
     */
    public function getBrawl(): string
    {
        return $this->brawl;
    }

    /**
     * @return string
     */
    public function getCommander(): string
    {
        return $this->commander;
    }

    /**
     * @return string
     */
    public function getDuel(): string
    {
        return $this->duel;
    }

    /**
     * @return string
     */
    public function getFuture(): string
    {
        return $this->future;
    }

    /**
     * @return string
     */
    public function getFrontier(): string
    {
        return $this->frontier;
    }

    /**
     * @return string
     */
    public function getLegacy(): string
    {
        return $this->legacy;
    }

    /**
     * @return string
     */
    public function getModern(): string
    {
        return $this->modern;
    }

    /**
     * @return string
     */
    public function getPauper(): string
    {
        return $this->pauper;
    }

    /**
     * @return string
     */
    public function getPenny(): string
    {
        return $this->penny;
    }

    /**
     * @return string
     */
    public function getPioneer(): string
    {
        return $this->pioneer;
    }

    /**
     * @return string
     */
    public function getStandard(): string
    {
        return $this->standard;
    }

    /**
     * @return string
     */
    public function getVintage(): string
    {
        return $this->vintage;
    }
}

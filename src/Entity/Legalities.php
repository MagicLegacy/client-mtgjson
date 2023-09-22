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
use Eureka\Component\Serializer\JsonSerializableTrait;

/**
 * Class Legalities
 *
 * @author Romain Cottard
 */
final class Legalities implements \JsonSerializable
{
    use JsonSerializableTrait;

    private string $brawl;
    private string $commander;
    private string $duel;
    private string $future;
    private string $frontier;
    private string $legacy;
    private string $modern;
    private string $pauper;
    private string $penny;
    private string $pioneer;
    private string $standard;
    private string $vintage;

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

    public function getBrawl(): string
    {
        return $this->brawl;
    }

    public function getCommander(): string
    {
        return $this->commander;
    }

    public function getDuel(): string
    {
        return $this->duel;
    }

    public function getFuture(): string
    {
        return $this->future;
    }

    public function getFrontier(): string
    {
        return $this->frontier;
    }

    public function getLegacy(): string
    {
        return $this->legacy;
    }

    public function getModern(): string
    {
        return $this->modern;
    }

    public function getPauper(): string
    {
        return $this->pauper;
    }

    public function getPenny(): string
    {
        return $this->penny;
    }

    public function getPioneer(): string
    {
        return $this->pioneer;
    }

    public function getStandard(): string
    {
        return $this->standard;
    }

    public function getVintage(): string
    {
        return $this->vintage;
    }
}

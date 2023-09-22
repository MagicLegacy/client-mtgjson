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
 * Class SetBasic
 *
 * @author Romain Cottard
 */
final class SetBasic implements \JsonSerializable
{
    use JsonSerializableTrait;

    private int $baseSetSize;
    private int $totalSetSize;
    private string $code;
    private string $name;
    private string $type;
    private string $releaseDate;
    private bool $isFoilOnly;
    private bool $isOnlineOnly;
    private bool $isPaperOnly;

    public function __construct(
        int $baseSetSize,
        int $totalSetSize,
        string $code,
        string $name,
        string $type,
        string $releaseDate,
        bool $isFoilOnly,
        bool $isOnlineOnly,
        bool $isPaperOnly
    ) {
        $this->baseSetSize  = $baseSetSize;
        $this->totalSetSize = $totalSetSize;
        $this->code         = $code;
        $this->name         = $name;
        $this->type         = $type;
        $this->releaseDate  = $releaseDate;
        $this->isFoilOnly   = $isFoilOnly;
        $this->isOnlineOnly = $isOnlineOnly;
        $this->isPaperOnly  = $isPaperOnly;
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
}

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
 * Class SetBasic
 *
 * @author Romain Cottard
 */
final class SetBasic implements \JsonSerializable
{
    use MtgJsonSerializableTrait;

    /** @var int */
    private $baseSetSize;

    /** @var int */
    private $totalSetSize;

    /** @var string */
    private $code;

    /** @var string */
    private $name;

    /** @var string */
    private $type;

    /** @var string */
    private $releaseDate;

    /** @var bool */
    private $isFoilOnly;

    /** @var bool */
    private $isOnlineOnly;

    /** @var bool */
    private $isPaperOnly;

    /**
     * SetBasic constructor.
     *
     * @param int $baseSetSize
     * @param int $totalSetSize
     * @param string $code
     * @param string $name
     * @param string $type
     * @param string $releaseDate
     * @param bool $isFoilOnly
     * @param bool $isOnlineOnly
     * @param bool $isPaperOnly
     */
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

    /**
     * @return int
     */
    public function getBaseSetSize(): int
    {
        return $this->baseSetSize;
    }

    /**
     * @return int
     */
    public function getTotalSetSize(): int
    {
        return $this->totalSetSize;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
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
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getReleaseDate(): string
    {
        return $this->releaseDate;
    }

    /**
     * @return bool
     */
    public function isFoilOnly(): bool
    {
        return $this->isFoilOnly;
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
    public function isPaperOnly(): bool
    {
        return $this->isPaperOnly;
    }
}

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
 * Class LeadershipSkills
 *
 * @author Romain Cottard
 */
final class LeadershipSkills implements \JsonSerializable
{
    use MtgJsonSerializableTrait;

    /** @var bool */
    private $hasBrawl;

    /** @var bool */
    private $hasCommander;

    /** @var bool */
    private $hasOathbreaker;


    /**
     * LeadershipSkills constructor.
     *
     * @param bool $hasBrawl
     * @param bool $hasCommander
     * @param bool $hasOathbreaker
     */
    public function __construct(bool $hasBrawl = false, bool $hasCommander = false, bool $hasOathbreaker = false)
    {
        $this->hasBrawl       = $hasBrawl;
        $this->hasCommander   = $hasCommander;
        $this->hasOathbreaker = $hasOathbreaker;
    }

    /**
     * @return bool
     */
    public function hasBrawl(): bool
    {
        return $this->hasBrawl;
    }

    /**
     * @return bool
     */
    public function hasCommander(): bool
    {
        return $this->hasCommander;
    }

    /**
     * @return bool
     */
    public function hasOathbreaker(): bool
    {
        return $this->hasOathbreaker;
    }
}

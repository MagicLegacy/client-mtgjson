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
 * Class Types
 *
 * @author Romain Cottard
 */
final class Types implements \JsonSerializable
{
    use JsonSerializableTrait;

    /** @var string[] $subTypes */
    private array $subTypes;

    /** @var string[] $superTypes */
    private array $superTypes;

    /**
     * Class constructor.
     *
     * @param string[] $subTypes
     * @param string[] $superTypes
     */
    public function __construct(
        array $subTypes,
        array $superTypes
    ) {
        $this->subTypes   = $subTypes;
        $this->superTypes = $superTypes;
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
}

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
 * Class Types
 *
 * @author Romain Cottard
 */
final class Types implements \JsonSerializable
{
    use MtgJsonSerializableTrait;

    /** @var array $subTypes */
    private $subTypes;

    /** @var array $superTypes */
    private $superTypes;

    /**
     * Class constructor.
     *
     * @param array $subTypes
     * @param array $superTypes
     */
    public function __construct(
        array $subTypes,
        array $superTypes
    ) {
        $this->subTypes = $subTypes;
        $this->superTypes = $superTypes;
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
    public function getSuperTypes(): array
    {
        return $this->superTypes;
    }
}

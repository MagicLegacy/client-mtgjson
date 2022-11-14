<?php

/*
 * Copyright (c) Romain Cottard
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace MagicLegacy\Component\MtgJson\Serializer;

/**
 * Trait MtgJsonSerializableTrait
 *
 * @author Romain Cottard
 */
trait MtgJsonSerializableTrait
{
    /**
     * @return array<mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        foreach (get_object_vars($this) as $property => $value) {
            $data[$property] = ($value instanceof \JsonSerializable) ? $value->jsonSerialize() : $value;
        }

        return $data;
    }
}

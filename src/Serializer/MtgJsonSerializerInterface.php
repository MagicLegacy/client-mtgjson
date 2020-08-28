<?php

/*
 * Copyright (c) Romain Cottard
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace MagicLegacy\Component\MtgJson\Serializer;

use MagicLegacy\Component\MtgJson\Exception\MtgJsonSerializerException;

/**
 * Interface JsonSerializerInterface
 *
 * @author Romain Cottard
 */
interface MtgJsonSerializerInterface extends \JsonSerializable
{
    /**
     * @param \JsonSerializable $object
     * @return string
     * @throws MtgJsonSerializerException
     */
    public function serialize(\JsonSerializable $object): string;

    /**
     * @param string $json
     * @return MtgJsonSerializerInterface
     * @throws MtgJsonSerializerException
     */
    public static function deserialize(string $json): MtgJsonSerializerInterface;
}

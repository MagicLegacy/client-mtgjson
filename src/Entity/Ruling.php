<?php

/*
 *  Copyright (c) Romain Cottard
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 *
 */

declare(strict_types=1);

namespace MagicLegacy\Component\MtgJson\Entity;

use MagicLegacy\Component\MtgJson\Serializer\MtgJsonSerializableTrait;

/**
 * Class Ruling
 *
 * @author Romain Cottard
 */
final class Ruling implements \JsonSerializable
{
    use MtgJsonSerializableTrait;

    private string $date;
    private string $text;

    public function __construct(string $date, string $text)
    {
        $this->date = $date;
        $this->text = $text;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function getText(): string
    {
        return $this->text;
    }
}

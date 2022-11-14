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
 * Class ForeignData
 *
 * @author Romain Cottard
 */
final class ForeignData implements \JsonSerializable
{
    use MtgJsonSerializableTrait;

    private string $faceName;
    private string $name;
    private string $text;
    private string $flavorText;
    private string $language;
    private int $multiverseId;
    private string $type;

    public function __construct(
        string $faceName,
        string $name,
        string $text,
        string $flavorText,
        string $language,
        int $multiverseId,
        string $type
    ) {
        $this->faceName     = $faceName;
        $this->name         = $name;
        $this->text         = $text;
        $this->flavorText   = $flavorText;
        $this->language     = $language;
        $this->multiverseId = $multiverseId;
        $this->type         = $type;
    }

    public function getFaceName(): string
    {
        return $this->faceName;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function getFlavorText(): string
    {
        return $this->flavorText;
    }

    public function getLanguage(): string
    {
        return $this->language;
    }

    public function getMultiverseId(): int
    {
        return $this->multiverseId;
    }

    public function getType(): string
    {
        return $this->type;
    }
}

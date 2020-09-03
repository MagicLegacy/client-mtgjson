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
 * Class Translations
 *
 * @author Romain Cottard
 */
final class Translations implements \JsonSerializable
{
    use MtgJsonSerializableTrait;

    /** @var array $translations */
    private $translations;

    /**
     * Translations constructor.
     *
     * @param array $translations
     */
    public function __construct(array $translations)
    {
        $this->translations = $translations;
    }

    /**
     * @return array
     */
    public function getTranslations(): array
    {
        return $this->translations;
    }

    /**
     * @param string $name
     * @return string
     */
    public function getTranslation(string $name): string
    {
        return $this->translations[$name] ?? '';
    }
}

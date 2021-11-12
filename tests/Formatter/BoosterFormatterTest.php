<?php

/*
 * Copyright (c) Deezer
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace MagicLegacy\Component\MtgJson\Tests\Formatter;

use MagicLegacy\Component\MtgJson\Formatter\BoosterFormatter;
use PHPUnit\Framework\TestCase;

/**
 * Class BoosterFormatterTest
 */
class BoosterFormatterTest extends TestCase
{
    /**
     * @return void
     */
    public function testICanGetValuesFromValueObjectAfterFormatting(): void
    {
        $result = (object) [
            'meta' => (object) [
                'date'    => '2020-01-01',
                'version' => '1.0.0+20200101'
            ],
            'data' => (object) [
                'default' => [
                    'boosters'            => [],
                    'boostersTotalWeight' => 4,
                    'sheets'              => (object) [],
                ],
            ],
        ];

        $data   = $result->data;
        $entity = (new BoosterFormatter())->format($result->data);

        $this->assertEquals($data, $entity->getRawData());
    }
}

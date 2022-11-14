<?php

/*
 *  Copyright (c) Romain Cottard
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace MagicLegacy\Component\MtgJson\Formatter;

use MagicLegacy\Component\MtgJson\Entity\PurchaseUrls;

/**
 * Class PurchaseUrlsFormatter
 *
 * @author Romain Cottard
 */
final class PurchaseUrlsFormatter implements FormatterInterface
{
    /**
     * Format data & return list of value object.
     *
     * @param \stdClass $data
     * @return PurchaseUrls
     */
    public function format($data): PurchaseUrls
    {
        return new PurchaseUrls(
            $data->cardKingdom ?? '',
            $data->cardKingdomFoil ?? '',
            $data->cardmarket ?? '',
            $data->tcgplayer ?? ''
        );
    }
}

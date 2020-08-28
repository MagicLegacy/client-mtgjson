<?php

/*
 * Copyright (c) Romain Cottard
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace MagicLegacy\Component\MtgJson\Client;

use MagicLegacy\Component\MtgJson\Entity\SetBasic;
use MagicLegacy\Component\MtgJson\Exception\MtgJsonClientException;
use MagicLegacy\Component\MtgJson\Formatter\SetListFormatter;

/**
 * Class SetClient
 *
 * @author Romain Cottard
 */
class SetClient extends AbstractClient
{
    /**
     * @return SetBasic[]
     * @throws MtgJsonClientException
     */
    public function getList(): iterable
    {
        $path   = '/SetList.json';
        $result = $this->fetchResult($path, new SetListFormatter());

        if (empty($result)) {
            $result = [];
        }

        return $result;
    }
}

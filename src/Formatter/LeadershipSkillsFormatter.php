<?php

/*
 * Copyright (c) Romain Cottard
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace MagicLegacy\Component\MtgJson\Formatter;

use MagicLegacy\Component\MtgJson\Entity\LeadershipSkills;

/**
 * Class LeadershipSkillsFormatter
 *
 * @author Romain Cottard
 */
final class LeadershipSkillsFormatter implements FormatterInterface
{
    /**
     * Format data & return list of value object.
     *
     * @param \stdClass|null $data
     * @return LeadershipSkills
     */
    public function format($data): LeadershipSkills
    {
        if (empty($data)) {
            return new LeadershipSkills();
        }

        return new LeadershipSkills(
            (bool) ($data->brawl ?? false),
            (bool) ($data->commander ?? false),
            (bool) ($data->oathbreaker ?? false)
        );
    }
}

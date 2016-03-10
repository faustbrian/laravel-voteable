<?php

/*
 * This file is part of Laravel Voteable.
 *
 * (c) DraperStudio <hello@draperstudio.tech>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DraperStudio\Voteable\Traits;

use DraperStudio\Voteable\Models\Vote;

/**
 * Class Voteable.
 *
 * @author DraperStudio <hello@draperstudio.tech>
 */
trait Voteable
{
    /**
     * @return mixed
     */
    public function votes()
    {
        return $this->morphMany(Vote::class, 'voteable');
    }
}

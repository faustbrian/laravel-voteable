<?php

/*
 * This file is part of Laravel Voteable.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\Voteable;

trait HasVotesTrait
{
    public function votes()
    {
        return $this->morphMany(Vote::class, 'voteable');
    }
}

<?php

namespace BrianFaust\Voteable\Traits;

use BrianFaust\Voteable\Vote;

trait HasVotesTrait
{
    public function votes()
    {
        return $this->morphMany(Vote::class, 'voteable');
    }
}

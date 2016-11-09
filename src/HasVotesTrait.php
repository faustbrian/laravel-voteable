<?php

namespace BrianFaust\Voteable;

use BrianFaust\Voteable\Vote;

trait HasVotesTrait
{
    public function votes()
    {
        return $this->morphMany(Vote::class, 'voteable');
    }
}

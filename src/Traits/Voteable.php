<?php

namespace BrianFaust\Voteable\Traits;

use BrianFaust\Voteable\Models\Vote;

trait Voteable
{
    public function votes()
    {
        return $this->morphMany(Vote::class, 'voteable');
    }
}

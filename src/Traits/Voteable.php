<?php

namespace DraperStudio\Voteable\Traits;

use DraperStudio\Voteable\Models\Vote;

trait Voteable
{
    public function votes()
    {
        return $this->morphMany(Vote::class, 'voteable');
    }
}

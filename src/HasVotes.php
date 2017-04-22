<?php



declare(strict_types=1);



namespace BrianFaust\Voteable;

use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasVotes
{
    public function votes(): MorphMany
    {
        return $this->morphMany(Vote::class, 'voteable');
    }
}

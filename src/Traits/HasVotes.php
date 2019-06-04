<?php

declare(strict_types=1);

/*
 * This file is part of Laravel Voteable.
 *
 * (c) Brian Faust <hello@basecode.sh>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Artisanry\Voteable\Traits;

use Artisanry\Voteable\Models\Vote;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasVotes
{
    public function votes(): MorphMany
    {
        return $this->morphMany(Vote::class, 'voteable');
    }

    public function hasVoted(string $ip)
    {
        return $this->votes()->whereVoter($ip)->count();
    }

    public function hasUpvoted(string $ip)
    {
        return $this->votes()->whereVoter($ip)->whereType('up')->count();
    }

    public function hasDownvoted(string $ip)
    {
        return $this->votes()->whereVoter($ip)->whereType('down')->count();
    }

    public function upvote()
    {
        return Vote::up($this);
    }

    public function downvote()
    {
        return Vote::down($this);
    }
}

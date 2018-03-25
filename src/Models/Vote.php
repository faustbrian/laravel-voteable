<?php

declare(strict_types=1);

/*
 * This file is part of Laravel Voteable.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\Voteable\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Vote extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function voteable(): MorphTo
    {
        return $this->morphTo();
    }

    public static function sum(Model $voteable): float
    {
        return $voteable->votes()->count();
    }

    public static function count(Model $voteable): int
    {
        return $voteable->votes()->count();
    }

    public static function countUps(Model $voteable): int
    {
        return $voteable->votes()->where('type', 'up')->count();
    }

    public static function countDowns(Model $voteable): int
    {
        return $voteable->votes()->where('type', 'down')->count();
    }

    public static function countByDate(Model $voteable, $from, $to = null): int
    {
        $query = $voteable->votes();

        if (!empty($to)) {
            $range = [new Carbon($from), new Carbon($to)];
        } else {
            $range = [
                (new Carbon($from))->startOfDay(),
                (new Carbon($to))->endOfDay(),
            ];
        }

        return $query->whereBetween('created_at', $range)->count();
    }

    public static function up(Model $voteable): bool
    {
        return (bool) static::vote($voteable, 'up');
    }

    public static function down(Model $voteable): bool
    {
        return (bool) static::vote($voteable, 'down');
    }

    protected static function vote(Model $voteable, string $type): bool
    {
        $vote = new static();
        $vote->type = $type;
        $vote->voter = request()->ip();

        static::unvote($voteable, $vote->voter);

        return (bool) $vote->voteable()->associate($voteable)->save();
    }

    protected static function unvote(Model $voteable, string $ip) {
        return $voteable->votes()->where('voter', $ip)->delete();
    }
}

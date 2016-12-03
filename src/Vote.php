<?php

/*
 * This file is part of Laravel Voteable.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

/*
 * This file is part of Laravel Voteable.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\Voteable;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function voteable()
    {
        return $this->morphTo();
    }

    public static function sum(Model $voteable)
    {
        return $voteable->votes()
                        ->sum('value');
    }

    public static function count(Model $voteable)
    {
        return $voteable->votes()
                        ->count();
    }

    public static function countUps(Model $voteable, $value = 1)
    {
        return $voteable->votes()
                        ->where('value', $value)
                        ->count();
    }

    public static function countDowns(Model $voteable, $value = -1)
    {
        return $voteable->votes()
                        ->where('value', $value)
                        ->count();
    }

    public static function countByDate(Model $voteable, $from, $to = null)
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

        return $query->whereBetween('created_at', $range)
                     ->count();
    }

    public static function up(Model $voteable)
    {
        return static::cast($voteable, 1);
    }

    public static function down(Model $voteable)
    {
        return static::cast($voteable, -1);
    }

    public function setValueAttribute($value)
    {
        $this->attributes['value'] = ($value == -1) ? -1 : 1;
    }

    protected static function cast(Model $voteable, $value = 1)
    {
        if (!$voteable->exists) {
            return false;
        }

        $vote = new static();
        $vote->value = $value;

        return $vote->voteable()
                    ->associate($voteable)
                    ->save();
    }
}

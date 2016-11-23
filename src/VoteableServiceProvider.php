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

use BrianFaust\ServiceProvider\ServiceProvider;

class VoteableServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishMigrations();
    }

    public function getPackageName()
    {
        return 'voteable';
    }
}

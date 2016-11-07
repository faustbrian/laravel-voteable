<?php

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

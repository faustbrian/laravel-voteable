<?php

namespace DraperStudio\Voteable;

use DraperStudio\ServiceProvider\ServiceProvider as BaseProvider;

class ServiceProvider extends BaseProvider
{
    protected $packageName = 'voteable';

    public function boot()
    {
        $this->setup(__DIR__)
             ->publishMigrations();
    }
}

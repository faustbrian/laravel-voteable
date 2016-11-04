<?php

namespace BrianFaust\Tests\Voteable;

use GrahamCampbell\TestBench\AbstractPackageTestCase;

abstract class AbstractTestCase extends AbstractPackageTestCase
{
    protected function getServiceProviderClass($app)
    {
        return \BrianFaust\Voteable\ServiceProvider::class;
    }
}

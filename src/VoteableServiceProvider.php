<?php



declare(strict_types=1);



namespace BrianFaust\Voteable;

use BrianFaust\ServiceProvider\AbstractServiceProvider;

class VoteableServiceProvider extends AbstractServiceProvider
{
    public function boot(): void
    {
        $this->publishMigrations();
    }

    public function getPackageName(): string
    {
        return 'voteable';
    }
}

<?php

namespace IchBin\FilamentTicket;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use IchBin\FilamentTicket\Commands\FilamentTicketCommand;

class FilamentTicketServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('filament-ticket')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_filament-ticket_table')
            ->hasCommand(FilamentTicketCommand::class);
    }
}

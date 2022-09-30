<?php

namespace IchBin\FilamentTicket;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use IchBin\FilamentTicket\Commands\FilamentTicketCommand;
use Filament\PluginServiceProvider;

class FilamentTicketServiceProvider extends PluginServiceProvider
{
     protected function getResources(): array
    {
        return config("filament-ticket.resources", []);
    }


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
            ->hasMigration('create_filament_ticket_table')
            //->hasMigration('add_relationship_fields_to_filament_ticket_table')
            //->hasMigration('add_relationship_fields_to_filament_ticket_comments_table')
            ->hasCommand(FilamentTicketCommand::class);
    }
}

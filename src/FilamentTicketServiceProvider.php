<?php

namespace IchBin\FilamentTicket;

use Livewire\Livewire;
use Filament\PluginServiceProvider;
use Illuminate\Support\Facades\Blade;
use Spatie\LaravelPackageTools\Package;
use IchBin\FilamentTicket\Http\Livewire\Comment;
use IchBin\FilamentTicket\Http\Livewire\Comments;
use Filament\Resources\RelationManagers\RelationGroup;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use IchBin\FilamentTicket\Commands\FilamentTicketCommand;

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
            ->hasViews('filament-ticket')
            ->hasMigration('create_filament_ticket_table')
            ->hasViewComponent('comments', \IchBin\FilamentTicket\Livewire\Comments::class)
            ->hasCommand(FilamentTicketCommand::class);
    }
}

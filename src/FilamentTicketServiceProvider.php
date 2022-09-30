<?php

namespace IchBin\FilamentTicket;

use Livewire\Livewire;
use Filament\PluginServiceProvider;
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
            //->hasMigration('add_relationship_fields_to_filament_ticket_table')
            //->hasMigration('add_relationship_fields_to_filament_ticket_comments_table')
            ->hasCommand(FilamentTicketCommand::class);

        // Livewire::component('your-package::your-component', YourComponent::class);
    }

    public function packageBooted(): void
    {
        foreach ($this->getPages() as $page) {
            Livewire::component($page::getName(), $page);
        }

        foreach ($this->getRelationManagers() as $manager) {
            if ($manager instanceof RelationGroup) {
                foreach ($manager->getManagers() as $groupedManager) {
                    $this->registerRelationManager($groupedManager);
                }

                return;
            }

            $this->registerRelationManager($manager);
        }

        foreach ($this->getResources() as $resource) {
            foreach ($resource::getPages() as $page) {
                Livewire::component($page['class']::getName(), $page['class']);
            }

            foreach ($resource::getRelations() as $relation) {
                if ($relation instanceof RelationGroup) {
                    foreach ($relation->getManagers() as $groupedRelation) {
                        Livewire::component($groupedRelation::getName(), $groupedRelation);
                    }

                    continue;
                }

                Livewire::component($relation::getName(), $relation);
            }

            foreach ($resource::getWidgets() as $widget) {
                Livewire::component($widget::getName(), $widget);
            }
        }

        foreach ($this->getWidgets() as $widget) {
            Livewire::component($widget::getName(), $widget);
        }

        $this->registerMacros();

        Livewire::component('filament-ticket::comments', Comments::class);
        Livewire::component('filament-ticket::comment', Comment::class);
    }

    // /**
    //  * Do specific things after package has been booted.
    //  *
    //  * @return void
    //  */
    // public function packageBooted(): void
    // {
    //     //Livewire::component('filament-ticket::comments', Comments::class);
    //     //Livewire::component('filament-ticket::comments', Comment::class);
    // }

    // public function boot()
    // {
    //     //Livewire::component('your-package::your-component', YourComponent::class);

    //     if (!$this->app->runningInConsole()) {
    //         //\Livewire\Livewire::component('livewire.comments', \IchBin\FilamentTicket\Livewire\Comments::class);
    //         //\Livewire\Livewire::component('filament-ticket::livewire.comment', \IchBin\FilamentTicket\Livewire\Comment::class);

    //     }
    // }
}

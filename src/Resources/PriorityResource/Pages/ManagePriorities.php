<?php

namespace IchBin\FilamentTicket\Resources\PriorityResource\Pages;

use IchBin\FilamentTicket\Resources\PriorityResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManagePriorities extends ManageRecords
{
    protected static string $resource = PriorityResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

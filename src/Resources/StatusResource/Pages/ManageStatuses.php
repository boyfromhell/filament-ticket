<?php

namespace IchBin\FilamentTicket\Resources\StatusResource\Pages;

use IchBin\FilamentTicket\Resources\StatusResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageStatuses extends ManageRecords
{
    protected static string $resource = StatusResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

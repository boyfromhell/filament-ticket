<?php

namespace IchBin\FilamentTicket\Resources\TicketResource\Pages;

use IchBin\FilamentTicket\Resources\TicketResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTicket extends EditRecord
{
    protected static string $resource = TicketResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }

    protected function getFooterWidgets(): array
    {
        return [
            TicketResource\Widgets\TicketComments::class,
        ];
    }
}

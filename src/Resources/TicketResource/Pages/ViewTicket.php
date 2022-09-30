<?php

namespace IchBin\FilamentTicket\Resources\TicketResource\Pages;

use IchBin\FilamentTicket\Resources\TicketResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewTicket extends ViewRecord
{
    protected static string $resource = TicketResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }

    protected function getFooterWidgets(): array
    {
        return [
            TicketResource\Widgets\TicketComments::class,
        ];
    }
}

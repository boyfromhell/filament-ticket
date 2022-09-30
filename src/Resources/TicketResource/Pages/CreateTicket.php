<?php

namespace IchBin\FilamentTicket\Resources\TicketResource\Pages;

use IchBin\FilamentTicket\Resources\TicketResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTicket extends CreateRecord
{
    protected static string $resource = TicketResource::class;
}

<?php

namespace IchBin\FilamentTicket\Resources\TicketResource\Widgets;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Widgets\Widget;
use Illuminate\Database\Eloquent\Model;
use IchBin\FilamentTicket\Models\Comment;

class TicketComments extends Widget implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    protected static string $view = 'filament-ticket::filament.resources.ticket-resource.widgets.ticket-comments';

    public ?Model $record;

    protected int | string | array $columnSpan = 'full';

}

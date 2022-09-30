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

    public $comment_text;
    public $user_id;

    public function mount(): void
    {
        $this->form->fill([
            'user_id' => auth()->user()->id,
            'comment_text' => '',
            'ticket_id' => $this->record->id,
        ]);
    }

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\MarkdownEditor::make('comment_text')->required(),
            Forms\Components\Hidden::make('user_id'),
            Forms\Components\Hidden::make('ticket_id'),
        ];
    }

    public function submit(): void
    {
        //dd($this->form->getState());

        $comment = Comment::create($this->form->getState());

        $this->record->sendCommentNotification($comment);

        $this->form->fill([
            'user_id' => auth()->user()->id,
            'comment_text' => '',
            'ticket_id' => $this->record->id,
        ]);
    }
}

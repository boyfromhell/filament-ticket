<?php

namespace IchBin\FilamentTicket\Http\Livewire;

use Filament\Forms;
use Livewire\Component;
use Illuminate\Contracts\View\View;
use IchBin\FilamentTicket\Models\Comment;

class Comments extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    public $model;

    public $comment_text;
    public $user_id;

    protected $listeners = ['refreshComponent' => '$refresh'];

    public function mount(): void
    {
        //$this->user_id = auth()->user()->id;
        $this->form->fill([
            'user_id' => auth()->user()->id,
            'comment_text' => '',
            'ticket_id' => $this->model->id,
        ]);
    }

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\MarkdownEditor::make('comment_text')->required()->label('Reply to'),
            Forms\Components\Hidden::make('user_id'),
            Forms\Components\Hidden::make('ticket_id'),
        ];
    }

    public function create(): void
    {
        //dd($this->user_id);
        $comment = Comment::create($this->form->getState());

        $this->model->sendCommentNotification($comment);

        $this->emit('refreshComponent');
    }

    // public $newCommentState = [
    //     'body' => ''
    // ];

    // protected $validationAttributes = [
    //     'newCommentState.body' => 'comment'
    // ];


    // public function postComment()
    // {
    //     $this->validate([
    //         'newCommentState.body' => ['required', new Spamfree],
    //     ]);


    //     $comment = $this->model->comments()->make($this->newCommentState);
    //     $comment->user()->associate(auth()->user());
    //     $comment->status = 'active';
    //     $comment->save();

    //     $this->newCommentState = [
    //         'body' => ''
    //     ];

    //     $this->resetPage();
    // }

    public function render(): View
    {
        $comments = $this->model
            ->comments()
            ->with('user')
            //->latest()
            //->where('status', 'active')
            ->withTrashed()
            //->paginate(10);
            ->get();

        return view('filament-ticket::livewire.comments', [
            'comments' => $comments
        ]);
    }
}

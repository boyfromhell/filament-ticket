<?php

namespace IchBin\FilamentTicket\Http\Livewire;

use App\Rules\Spamfree;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Comment extends Component
{
    use AuthorizesRequests;

    public $comment;

    public $isReplying = false;

    public $replyState = [
        'body' => ''
    ];

    public $isEditing = false;

    public $editState = [
        'body' => ''
    ];

    protected $listeners = [
        'refresh' => '$refresh'
    ];

    protected $validationAttributes = [
        'replyState.body' => 'reply'
    ];

    public function updatedIsEditing($isEditing)
    {
        if (!$isEditing) {
            return;
        }

        $this->editState = [
            'body' => $this->comment->body
        ];
    }

    public function editComment()
    {
        $this->authorize('update', $this->comment);

        $this->validate([
            'editState.body' => [new Spamfree],
        ]);

        $this->comment->update($this->editState);

        $this->isEditing = false;
    }

    public function deleteComment()
    {
        $this->authorize('destroy', $this->comment);

        $this->comment->deleteWithoutTouch();

        $this->emitUp('refresh');
    }

    public function restoreComment()
    {
        $this->authorize('permaDelete', $this->comment);

        $this->comment->restoreWithoutTouch();

        $this->emitUp('refresh');
    }

    public function permaDelete()
    {
        $this->authorize('permaDelete', $this->comment);

        $this->comment->forceDeleteWithoutTouch();

        $this->emitUp('refresh');
    }

    public function postReply()
    {
        if (!$this->comment->hasParent()) {
            return;
        }

        $this->validate([
            'replyState.body' => ['required', new Spamfree],
        ]);

        $reply = $this->comment->children()->make($this->replyState);
        $reply->user()->associate(auth()->user());
        $reply->commentable()->associate($this->comment->commentable);

        $reply->status = 'active';

        $reply->save();

        $this->replyState = [
            'body' => ''
        ];

        $this->isReplying = false;

        $this->emitSelf('refresh');
    }

    public function render()
    {
        return view('filament-ticket::livewire.comment');
    }
}

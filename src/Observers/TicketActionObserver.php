<?php

namespace IchBin\FilamentTicket\Observers;

use IchBin\FilamentTicket\Models\Ticket;
use Illuminate\Support\Facades\Notification;
use IchBin\FilamentTicket\Notifications\AssignedTicketNotification;
use IchBin\FilamentTicket\Notifications\DataChangeEmailNotification;

class TicketActionObserver
{
    public function created(Ticket $model)
    {
        $data  = ['action' => 'New ticket has been created!', 'model_name' => 'Ticket', 'ticket' => $model];
        $users = \App\Models\User::whereHas('roles', function ($q) {
            return $q->where('name', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(Ticket $model)
    {
        if ($model->isDirty('assigned_to_user_id')) {
            $user = $model->assigned_to_user;
            if ($user) {
                Notification::send($user, new AssignedTicketNotification($model));
            }
        }
    }
}

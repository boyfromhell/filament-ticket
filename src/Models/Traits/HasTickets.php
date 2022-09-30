<?php

namespace IchBin\FilamentTicket\Models\Traits;

use IchBin\FilamentTicket\Models\Ticket;
use IchBin\FilamentTicket\Models\Comment;


/**
 * HasTicke
 */
trait HasTickets
{
    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'assigned_to_user_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'user_id', 'id');
    }
}

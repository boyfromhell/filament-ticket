<?php

namespace IchBin\FilamentTicket\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Priority extends Model
{
    use SoftDeletes;

    public $table = 'ticket_priorities';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'color',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'priority_id', 'id');
    }
}

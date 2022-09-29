<?php

namespace IchBin\FilamentTicket\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \IchBin\FilamentTicket\FilamentTicket
 */
class FilamentTicket extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \IchBin\FilamentTicket\FilamentTicket::class;
    }
}

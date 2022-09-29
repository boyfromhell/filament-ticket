<?php

namespace IchBin\FilamentTicket\Commands;

use Illuminate\Console\Command;

class FilamentTicketCommand extends Command
{
    public $signature = 'filament-ticket';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}

<?php

namespace CodeWithDennis\FilamentLucideIcons\Commands;

use Illuminate\Console\Command;

class FilamentLucideIconsCommand extends Command
{
    public $signature = 'filament-lucide-icons';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}

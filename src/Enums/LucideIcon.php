<?php

namespace CodeWithDennis\FilamentLucideIcons\Enums;

use Filament\Support\Contracts\ScalableIcon;
use Filament\Support\Enums\IconSize;

enum LucideIcon: string implements ScalableIcon
{
    case ArchiveRestore = 'archive-restore';

    public function getIconForSize(IconSize $size): string
    {
        return 'lucide-' . $this->value;
    }
}

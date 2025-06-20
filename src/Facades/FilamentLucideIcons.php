<?php

namespace CodeWithDennis\FilamentLucideIcons\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \CodeWithDennis\FilamentLucideIcons\FilamentLucideIcons
 */
class FilamentLucideIcons extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \CodeWithDennis\FilamentLucideIcons\FilamentLucideIcons::class;
    }
}

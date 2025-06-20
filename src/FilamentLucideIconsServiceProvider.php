<?php

namespace CodeWithDennis\FilamentLucideIcons;

use CodeWithDennis\FilamentLucideIcons\Commands\FilamentLucideIconsCommand;
use Filament\Support\Assets\Asset;
use Filament\Support\Facades\FilamentIcon;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentLucideIconsServiceProvider extends PackageServiceProvider
{
    public static string $name = 'filament-lucide-icons';

    public static string $viewNamespace = 'filament-lucide-icons';

    public function configurePackage(Package $package): void
    {
        $package->name(static::$name)
            ->hasCommands($this->getCommands())
            ->hasInstallCommand(function (InstallCommand $command) {
                $command
                    ->askToStarRepoOnGitHub('codewithdennis/filament-lucide-icons');
            });

        $configFileName = $package->shortName();
    }

    public function packageRegistered(): void {}

    public function packageBooted(): void
    {
        // Icon Registration
        //        FilamentIcon::register($this->getIcons());
    }

    protected function getAssetPackageName(): ?string
    {
        return 'codewithdennis/filament-lucide-icons';
    }

    /**
     * @return array<Asset>
     */
    protected function getAssets(): array
    {
        return [
            //
        ];
    }

    /**
     * @return array<class-string>
     */
    protected function getCommands(): array
    {
        return [
            FilamentLucideIconsCommand::class,
        ];
    }

    /**
     * @return array<string>
     */
    protected function getIcons(): array
    {
        return [];
    }

    /**
     * @return array<string>
     */
    protected function getRoutes(): array
    {
        return [];
    }

    /**
     * @return array<string, mixed>
     */
    protected function getScriptData(): array
    {
        return [];
    }

    /**
     * @return array<string>
     */
    protected function getMigrations(): array
    {
        return [
            //
        ];
    }
}

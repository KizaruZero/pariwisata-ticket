<?php

namespace App\Filament\Pages;

use ShuvroRoy\FilamentSpatieLaravelBackup\Pages\Backups as BaseBackups;
use Illuminate\Contracts\Support\Htmlable;
use Filament\Pages\Page;


class Backups extends BaseBackups
{
    protected static ?string $navigationIcon = 'heroicon-o-cpu-chip';

    public function getHeading(): string|Htmlable
    {
        return 'Application Backups';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Core';
    }

    public function create(string $option = ''): void
    {
        $command = "cd " . base_path() . " && php artisan backup:run";
        $command .= !empty($option) ? " --{$option}" : "";
        $output = shell_exec($command);
    }
}
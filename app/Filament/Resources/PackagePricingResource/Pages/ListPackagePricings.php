<?php

namespace App\Filament\Resources\PackagePricingResource\Pages;

use App\Filament\Resources\PackagePricingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPackagePricings extends ListRecords
{
    protected static string $resource = PackagePricingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

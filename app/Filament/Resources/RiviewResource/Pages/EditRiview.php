<?php

namespace App\Filament\Resources\RiviewResource\Pages;

use App\Filament\Resources\RiviewResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRiview extends EditRecord
{
    protected static string $resource = RiviewResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

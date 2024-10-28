<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;

class ListOrders extends ListRecords
{
    protected static string $resource = OrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),

        ];
    }
    public function getTabs(): array
    {
        return [
            null => Tab::make('All'),
            'pending' => Tab::make()->query(fn($query) => $query->where('status', 'pending')),
            'approved' => Tab::make()->query(fn($query) => $query->where('status', 'approved')),
            'rejected' => Tab::make()->query(fn($query) => $query->where('status', 'rejected')),
        ];
    }
    protected function getHeaderWidgets(): array
    {
        return OrderResource::getWidgets();
    }


}

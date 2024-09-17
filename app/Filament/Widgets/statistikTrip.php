<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Destination;
use App\Models\Region;
use App\Models\Category;

class statistikTrip extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Destinations', Destination::count())
                ->description('Total Destinasi Wisata yang terdaftar')
                ->descriptionIcon('heroicon-o-map-pin') // Gunakan ikon yang benar
                ->chart([1, 3, 5, 10, 20, 40])
                ->color('success'),
            Stat::make('Total Region/Wilayah', Region::count())
                ->description('Total Region/Wilayah yang terdaftar')
                ->descriptionIcon('heroicon-o-map') // Gunakan ikon yang benar
                ->chart([1, 3, 5, 10, 20, 40])
                ->color('success'),
            Stat::make('Total Kategori', Category::count())
                ->description('Total Kategori yang terdaftar')
                ->descriptionIcon('heroicon-o-map-pin') // Gunakan ikon yang benar
                ->chart([1, 3, 5, 10, 20, 40])
                ->color('success'),
        ];
    }
}

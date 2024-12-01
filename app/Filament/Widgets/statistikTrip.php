<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Destination;
use App\Models\Region;
use App\Models\Category;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Illuminate\Support\Carbon;
use App\Models\Order;



class statistikTrip extends BaseWidget
{
    use InteractsWithPageFilters;

    protected function getStats(): array
    {
        // $startDate = !is_null($this->filters['startDate'] ?? null) ?
        //     Carbon::parse($this->filters['startDate']) :
        //     null;

        // $endDate = !is_null($this->filters['endDate'] ?? null) ?
        //     Carbon::parse($this->filters['endDate']) :
        //     now();

        $startDate = isset($this->filters['startDate']) ?
            Carbon::parse($this->filters['startDate']) :
            Carbon::now()->startOfYear();

        // Set default end date to today if not provided
        $endDate = isset($this->filters['endDate']) ?
            Carbon::parse($this->filters['endDate']) :
            Carbon::now();


        $totalSales = Order::penjualan()->whereBetween('booking_date', [$startDate, $endDate])->sum('total_price');
        return [
            Stat::make('Total Destinations', Destination::count())
                ->description('Total Destinasi Wisata yang terdaftar')
                ->descriptionIcon('heroicon-o-map-pin') // Gunakan ikon yang benar
                ->color('success'),
            Stat::make('Total Region/Wilayah', Region::count())
                ->description('Total Region/Wilayah yang terdaftar')
                ->descriptionIcon('heroicon-o-map') // Gunakan ikon yang benar
                ->color('success'),
            Stat::make('Total Kategori', Category::count())
                ->description('Total Kategori yang terdaftar')
                ->descriptionIcon('heroicon-o-map-pin') // Gunakan ikon yang benar
                ->color('success'),
            Stat::make('Total Sales', $totalSales)
                ->description('Total Penjualan Tiket Wisata')
                ->descriptionIcon('heroicon-o-currency-dollar') // Gunakan ikon yang benar
                ->value($this->formatCurrency($totalSales))
                ->color('success')
                ->icon('heroicon-o-currency-dollar'),
        ];
    }

    public function formatCurrency($value)
    {
        return 'Rp ' . number_format($value, 0, ',', '.');
    }
}

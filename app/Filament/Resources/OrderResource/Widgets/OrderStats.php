<?php

namespace App\Filament\Resources\OrderResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Order;

class OrderStats extends BaseWidget
{
    protected function getStats(): array
    {
        $totalOrders = Order::where('status', '!=', 'rejected')->count();
        $totalSales = Order::where('status', '!=', 'rejected')->sum('total_price');
        $totalCustomers = Order::where('status', '!=', 'rejected')->distinct('user_id')->count();
        return [
            Stat::make('Total Orders', $totalOrders)->value($totalOrders)
                ->color('primary')
                ->icon('heroicon-o-shopping-bag'),
            Stat::make('Total Sales', $totalSales)->value($this->formatCurrency($totalSales))
                ->color('success')
                ->icon('heroicon-o-currency-dollar'),
            Stat::make('Total Customers', $totalCustomers)->value($totalCustomers)
                ->color('warning')
                ->icon('heroicon-o-user-group'),
        ];
    }

    public function formatCurrency($value)
    {
        return 'Rp ' . number_format($value, 0, ',', '.');
    }
}

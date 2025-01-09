<?php

namespace App\Filament\Widgets;

use App\Models\Classes;
use App\Models\Customer;
use App\Models\Section;
use App\Models\Student;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;
    protected function getStats(): array
    {
        return [
            // Stat::make('Total Classes', Classes::count()),
            // Stat::make('Total Sections', Section::count()),
            // Stat::make('Total Students', Student::count()),

            Stat::make('Total Customers', Customer::count())
            ->description('Number of all registered customers')
            ->descriptionIcon('heroicon-s-user-group')
            ->color('primary'),

        // مشتریان فعال
        Stat::make('Active Customers', Customer::where('status', 'active')->count())
            ->description('Currently active customers')
            ->descriptionIcon('heroicon-s-check-circle')
            ->color('success'),

        // مشتریان جدید امروز
        Stat::make('New Customers Today', Customer::whereDate('created_at', now()->toDateString())->count())
            ->description('Customers registered today')
            ->descriptionIcon('heroicon-s-calendar')
            ->color('info'),
        ];
    }
}

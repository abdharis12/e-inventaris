<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\BarChart;
use App\Filament\Widgets\DashboardChart;
use App\Filament\Widgets\PieChart;
use App\Filament\Widgets\StatsOverview;
use BackedEnum;
use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;
use UnitEnum;

class Dashboard extends Page
{
    protected string $view = 'filament.pages.dashboard';
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedHome;
    protected static ?string $navigationLabel = 'Beranda';

    protected function getHeaderWidgets(): array
    {
        return [
            StatsOverview::class,
            DashboardChart::class,
            // PieChart::class,
            BarChart::class,
        ];
    }
}

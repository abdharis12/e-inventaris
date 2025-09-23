<?php

namespace App\Providers;

use App\Models\Item;
use App\Models\Maintenance;
use App\Observers\ItemObserver;
use App\Observers\MaintenanceObserver;
use Illuminate\Support\ServiceProvider;
use Filament\Support\Colors\Color;
use Filament\Support\Facades\FilamentColor;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        FilamentColor::register([
            'danger' => Color::Red,
            'gray' => Color::Zinc,
            'info' => Color::Blue,
            'primary' => Color::Pink,
            'success' => Color::Green,
            'warning' => Color::Amber,
            'violet' => Color::Violet,
            'yellow' => Color::Yellow,
            'rose' => Color::Rose,
            'emerald' => Color::Emerald,
            'indigo' => Color::Indigo,
            'cyan' => Color::Cyan,
            'slate' => Color::Slate,
            'emerald' => Color::Emerald,
            'gray' => Color::Gray,
            'stone' => Color::Stone,
        ]);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Maintenance::observe(MaintenanceObserver::class);
        Item::observe(ItemObserver::class);
    }
}

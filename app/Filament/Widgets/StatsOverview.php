<?php

namespace App\Filament\Widgets;

use App\Models\Item;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected ?string $pollingInterval = '10s';
    protected function getStats(): array
    {
        $jumlahPerbaikan = Item::where('status', 'under maintenance')->count();
        $jumlahProduk = Item::where('status', 'available')->count();
        $jumlahPeminjaman = Item::where('status', 'loaned')->count();

        return [
            Stat::make('Perbaikan', $jumlahPerbaikan)
                ->description('Sedang dalam proses perbaikan')
                ->descriptionIcon('heroicon-o-cog-8-tooth')
                ->color('danger'),
            Stat::make('Produk', $jumlahProduk)
                ->description('Produk yang tersedia')
                ->descriptionIcon('heroicon-o-archive-box')
                ->color('success'),
            Stat::make('Peminjaman', $jumlahPeminjaman)
                ->description('Produk dipinjam')
                ->descriptionIcon('heroicon-o-arrow-up-on-square')
                ->color('violet'),
        ];
    }
}

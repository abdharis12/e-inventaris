<?php

namespace App\Filament\Resources\Maintenances\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use App\Enums\JenisService;

class MaintenancesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('item.nama_barang')
                    ->label('Barang')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('jenis_service')
                    ->label('Jenis Service')
                    ->badge()
                    ->formatStateUsing(fn ($state) => JenisService::tryFrom($state)?->label() ?? $state)
                    ->color(fn ($state) => JenisService::tryFrom($state)?->getColor() ?? 'primary'),

                TextColumn::make('deskripsi')
                    ->label('Deskripsi')
                    ->limit(50),

                TextColumn::make('biaya')
                    ->label('Biaya')
                    ->money('idr', true),

                BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'warning' => 'pending',
                        'info' => 'in progress',
                        'success' => 'completed',
                    ]),

                TextColumn::make('tanggal_service')
                    ->label('Tanggal Servis')
                    ->date('d M Y'),

                TextColumn::make('interval_hari')
                    ->label('Interval (hari)'),

                TextColumn::make('next_service')
                    ->date('d M Y')
                    ->label('Service Berikutnya'),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        'pending' => 'Menunggu',
                        'in progress' => 'Sedang Berjalan',
                        'completed' => 'Selesai',
                    ]),
                    
                SelectFilter::make('item_id')
                    ->label('Barang')
                    ->relationship('item', 'nama_barang'),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}

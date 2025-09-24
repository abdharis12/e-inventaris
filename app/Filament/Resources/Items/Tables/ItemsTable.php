<?php

namespace App\Filament\Resources\Items\Tables;

use App\Enums\StatusBarang;
use App\Enums\KondisiBarang;
use Dom\Text;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ItemsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_barang')->label('Nama')->searchable()->sortable(),
                TextColumn::make('kode_barang')->label('Kode')->sortable(),
                TextColumn::make('kategori')->label('Kategori')->sortable(),
                TextColumn::make('lokasi')->label('Lokasi')->sortable(),
                TextColumn::make('kondisi')
                    ->label('Kondisi')
                    ->badge()
                    ->color(fn ($state) => $state instanceof KondisiBarang ? $state->getColor() : 'primary')
                    ->formatStateUsing(fn ($state) => $state instanceof KondisiBarang ? $state->label() : $state),
                TextColumn::make('jumlah')->label('Jumlah')->sortable(),
                TextColumn::make('tanggal_beli')->label('Tanggal Beli')->date(),
                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn ($state) => $state instanceof StatusBarang ? $state->getColor() : 'primary')
                    ->formatStateUsing(fn ($state) => $state instanceof StatusBarang ? $state->label() : $state),
                ImageColumn::make('foto')
                    ->label('Foto')
                    ->disk('public')
                    ->height(80)
                    ->width(80)
                    ->square(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        'available' => 'Tersedia',
                        'loaned' => 'Dipinjam',
                        'under maintenance' => 'Dalam Perawatan',
                    ]),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->actions([ 
                Action::make('download_qr')
                    ->label('Download QR')
                    ->icon('heroicon-o-qr-code')
                    ->button()
                    ->color('success')
                    ->url(fn ($record) => route('qr.show', $record->id))
                    ->openUrlInNewTab()
                    ->visible(fn () => auth()->user()?->hasRole('super_admin')),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}

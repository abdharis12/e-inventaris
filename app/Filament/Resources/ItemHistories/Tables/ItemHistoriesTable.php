<?php

namespace App\Filament\Resources\ItemHistories\Tables;

use Dom\Text;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use App\Enums\JenisHistory;
use Filament\Actions\DeleteAction;

class ItemHistoriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('item.nama_barang')
                    ->label('Produk')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('jenis')
                    ->label('Jenis Histori')
                    ->badge()
                    ->color(fn ($state) => JenisHistory::tryFrom($state)?->getColor() ?? 'primary')
                    ->formatStateUsing(fn ($state) => JenisHistory::tryFrom($state)?->label() ?? ucfirst($state))
                    ->sortable(),
                TextColumn::make('deskripsi')
                    ->label('Deskripsi')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('tanggal')
                    ->label('Tanggal')
                    ->searchable()
                    ->sortable()
                    ->date('d M Y'),
            ])
            ->filters([
                SelectFilter::make('jenis')
                    ->label('Jenis Histori')
                    ->options([
                        'created'    => 'Dibuat',
                        'updated'    => 'Diupdate',
                        'maintenance'=> 'Perawatan',
                        'repair'     => 'Perbaikan',
                        'moved'      => 'Dipindahkan',
                        'loaned'     => 'Dipinjam',
                        'returned'   => 'Dikembalikan',
                        'disposed'   => 'Dihapus',
                    ]),
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

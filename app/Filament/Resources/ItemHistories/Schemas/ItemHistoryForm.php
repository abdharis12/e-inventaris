<?php

namespace App\Filament\Resources\ItemHistories\Schemas;

use App\Enums\JenisHistory;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Date;

class ItemHistoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('History Barang')
                    ->description('Semua informasi terkait History barang.')
                    ->schema([
                        Select::make('item_id')
                            ->label('Produk')
                            ->relationship('item', 'nama_barang')
                            ->searchable()
                            ->required(),

                        Select::make('jenis')
                            ->label('Jenis Histori')
                            ->options(JenisHistory::options())
                            ->default(JenisHistory::CREATED)
                            ->required(),

                        TextInput::make('deskripsi')
                            ->label('Deskripsi')
                            ->required(),

                        DatePicker::make('tanggal')
                            ->label('Tanggal')
                            ->required(),
                        
                    ])
                    ->columns(2)
                    ->columnSpanFull()
                    ->extraAttributes([
                        'class' => 'p-8 text-lg shadow-lg rounded-xl bg-white',
                    ])
            ]);
    }
}

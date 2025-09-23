<?php

namespace App\Filament\Resources\Items\Schemas;

use App\Enums\KondisiBarang;
use App\Enums\StatusBarang;
use DateTime;
use Dom\Text;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;

class ItemForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Inventaris Barang')
                    ->description('Semua informasi terkait inventaris barang yang dimiliki Dinas Penanamanan Modal dan Pelayanan Terpadu Satu Pintu Kab. Muara Enim.')
                    ->schema([
                        TextInput::make('nama_barang')
                            ->label('Nama Barang')
                            ->required(),
                        TextInput::make('kode_barang')
                            ->label('Kode Barang')
                            ->required()
                            ->unique(ignoreRecord: true),
                        TextInput::make('kategori')
                            ->label('Kategori')
                            ->required(),
                        TextInput::make('lokasi')
                            ->label('Lokasi')
                            ->required(),
                        Select::make('kondisi')
                            ->label('Kondisi')
                            ->options(KondisiBarang::options())
                            ->default(KondisiBarang::BARU)
                            ->required(),
                        TextInput::make('jumlah')
                            ->label('Jumlah')
                            ->required()
                            ->numeric(),
                        TextInput::make('deskripsi')
                            ->label('Deskripsi')
                            ->nullable(),
                        DatePicker::make('tanggal_beli')
                            ->label('Tanggal Beli')
                            ->required()
                            ->date(),
                        Select::make('status')
                            ->label('Status')
                            ->options(StatusBarang::options())
                            ->default(StatusBarang::AVAILABLE)
                            ->required(),
                        FileUpload::make('foto')
                            ->label('Foto Barang')
                            ->image()
                            ->directory('items')
                            ->disk('public')
                            ->imagePreviewHeight('150')
                            ->downloadable()
                            ->openable()
                            ->preserveFilenames(false) 
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/jpg'])
                            ->nullable(),
                    ])
                    ->columns(2)
                    ->columnSpanFull()
                    ->extraAttributes([
                        'class' => 'p-8 text-lg shadow-lg rounded-xl bg-white',
                    ])
            ]);
    }
}

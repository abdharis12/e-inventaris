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
use Filament\Schemas\Components\Group;
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
                        Select::make('kategori')
                            ->label('Kategori')
                            ->options([
                                'Elektronik' => 'Elektronik',
                                'Furniture' => 'Furniture',
                                'Alat Tulis Kantor' => 'Alat Tulis Kantor',
                                'Kendaraan' => 'Kendaraan',
                                'Lainnya' => 'Lainnya',
                            ])
                            ->required(fn (callable $get) => $get('kategori') === 'Kendaraan')
                            ->live(),
                        Group::make([
                            TextInput::make('nopol')
                                ->label('Nomor Polisi')
                                ->required(),
                            Select::make('merk')
                                ->label('Merek')
                                ->options([
                                    'Honda' => 'Honda',
                                    'Yamaha' => 'Yamaha',
                                    'Suzuki' => 'Suzuki',
                                    'Daihatsu' => 'Daihatsu',
                                    'Toyota' => 'Toyota',
                                    'Mitsubishi' => 'Mitsubishi',
                                    'Nissan' => 'Nissan',
                                    'Isuzu' => 'Isuzu',
                                    'Hino' => 'Hino',
                                    'Mazda' => 'Mazda',
                                    'Kawasaki' => 'Kawasaki',
                                    'KTM' => 'KTM',
                                    'Ducati' => 'Ducati',
                                    'Harley-Davidson' => 'Harley-Davidson',
                                    'Lainnya' => 'Lainnya',
                                ])
                                ->required(),
                            TextInput::make('tipe')
                                ->label('Tipe')
                                ->helperText('Contoh: Matik Q Zenix')
                                ->required(),
                            Select::make('warna')
                                ->label('Warna')
                                ->options([
                                    'Hitam' => 'Hitam',
                                    'Putih' => 'Putih',
                                    'Merah' => 'Merah',
                                    'Biru' => 'Biru',
                                    'Abu-abu' => 'Abu-abu',
                                    'Silver' => 'Silver',
                                    'Kuning' => 'Kuning',
                                    'Hijau' => 'Hijau',
                                    'Coklat' => 'Coklat',
                                    'Orange' => 'Orange',
                                    'Ungu' => 'Ungu',
                                    'Pink' => 'Pink',
                                    'Emas' => 'Emas',
                                    'Lainnya' => 'Lainnya',
                                ])
                                ->required(),
                            TextInput::make('tahun')
                                ->label('Tahun')
                                ->numeric()
                                ->required(),
                            Select::make('bahan_bakar')
                                ->label('Bahan Bakar')
                                ->options([
                                    'Bensin' => 'Bensin',
                                    'Solar' => 'Solar',
                                    'Listrik' => 'Listrik',
                                    'Hybrid' => 'Hybrid',
                                    'Lainnya' => 'Lainnya',
                                ])
                                ->required(),
                            TextInput::make('kilometer')
                                ->label('Kilometer')
                                ->required()
                                ->numeric(),
                            ])
                            ->columns(2)
                            ->relationship('vehicle')
                            ->visible(fn (callable $get) => $get('kategori') === 'Kendaraan'),
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
                            ->native(false)
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
                        TextInput::make('nibar')
                            ->label('Nibar')
                            ->nullable()
                            ->unique(ignoreRecord: true),
                    ])
                    ->columns(2)
                    ->columnSpanFull()
                    ->extraAttributes([
                        'class' => 'p-8 text-lg shadow-lg rounded-xl bg-white',
                    ])
            ]);
    }
}

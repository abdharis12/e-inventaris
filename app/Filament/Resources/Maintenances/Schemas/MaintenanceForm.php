<?php

namespace App\Filament\Resources\Maintenances\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class MaintenanceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Perawatan Barang')
                    ->description('Semua informasi terkait Perawatan Barang yang dimiliki Dinas Penanamanan Modal dan Pelayanan Terpadu Satu Pintu Kab. Muara Enim.')
                    ->schema([
                        Select::make('item_id')
                            ->label('Barang')
                            ->relationship('item', 'nama_barang')
                            ->searchable()
                            ->required(),
                        
                        Select::make('jenis_service')
                            ->label('Jenis Service')
                            ->options([
                                'service berkala' => 'Service Berkala',
                                'service kerusakan' => 'Service Kerusakan',
                            ])
                            ->default('service berkala')
                            ->required(),

                        Textarea::make('deskripsi')
                            ->label('Deskripsi Perawatan')
                            ->required(),

                        TextInput::make('biaya')
                            ->label('Biaya')
                            ->numeric()
                            ->prefix('Rp')
                            ->nullable(),

                        Select::make('status')
                            ->label('Status')
                            ->options([
                                'pending' => 'Menunggu',
                                'in progress' => 'Sedang Berjalan',
                                'completed' => 'Selesai',
                            ])
                            ->default('pending'),

                        DatePicker::make('tanggal_service')
                            ->label('Tanggal Servis')
                            ->date('d M Y')
                            ->native(false)
                            ->required(),
                            
                        TextInput::make('interval_hari')
                            ->label('Interval Servis (Hari)')
                            ->numeric()
                            ->helperText('Contoh: 180 = 6 bulan sekali')
                            ->required(),
                    ])
                    ->columns(2)
                    ->columnSpanFull()
                    ->extraAttributes([
                        'class' => 'p-8 text-lg shadow-lg rounded-xl bg-white'
                    ]),
            ]);
    }
}

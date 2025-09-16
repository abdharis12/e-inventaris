<?php

namespace App\Filament\Resources\Loans\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Date;

class LoanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Peminjaman Barang')
                    ->description('Semua informasi terkait Peminjaman Barang yang dimiliki Dinas Penanamanan Modal dan Pelayanan Terpadu Satu Pintu Kab. Muara Enim.')
                    ->schema([
                        Select::make('item_id')
                            ->label('Produk')
                            ->relationship('item', 'nama_barang')
                            ->searchable()
                            ->required(),
                        Select::make('user_id')
                            ->label('Peminjam')
                            ->relationship('user', 'name')
                            ->searchable()
                            ->required(),
                        DatePicker::make('tanggal_pinjam')
                            ->label('Tanggal Peminjaman')
                            ->date()
                            ->required(),
                        DatePicker::make('tanggal_kembali')
                            ->label('Tanggal Pengembalian')
                            ->date()
                            ->nullable(),
                        Select::make('status')
                            ->label('Status')
                            ->options([
                                'ongoing' => 'Ongoing',
                                'returned' => 'Returned',
                                'overdue' => 'Overdue',
                            ])
                            ->default('ongoing')
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

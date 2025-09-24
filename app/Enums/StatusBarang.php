<?php

namespace App\Enums;

enum StatusBarang: string
{
    case AVAILABLE = 'available';
    case LOANED = 'loaned';
    case UNDER_MAINTENANCE = 'under maintenance';
    case DAMAGED = 'damaged';

    public function label(): string
    {
        return match ($this) {
            self::AVAILABLE => 'Tersedia',
            self::LOANED => 'Dipinjam',
            self::UNDER_MAINTENANCE => 'Dalam Perawatan',
            self::DAMAGED => 'Rusak',
        };
    }

    public static function options(): array
    {
        return collect(self::cases())
            ->mapWithKeys(fn ($case) => [$case->value => $case->label()])
            ->toArray();
    }

    public function getColor(): string
    {
        return match ($this) {
            self::AVAILABLE => 'success',
            self::LOANED => 'violet',
            self::UNDER_MAINTENANCE => 'danger',
            self::DAMAGED => 'red',
        };
    }
}

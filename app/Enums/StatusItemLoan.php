<?php

namespace App\Enums;

enum StatusItemLoan: string
{
    case AVAILABLE = 'available';
    case LOANED = 'loaned';

    public function label(): string
    {
        return match ($this) {
            self::AVAILABLE => 'Tersedia',
            self::LOANED => 'Dipinjam',
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
            self::LOANED => 'danger',
        };
    }
}

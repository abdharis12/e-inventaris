<?php

namespace App\Enums;

enum StatusLoan: string
{
    case ONGOING = 'ongoing';
    case RETURNED = 'returned';
    case OVERDUE = 'overdue';

    public function label(): string
    {
        return match ($this) {
            self::ONGOING => 'Sedang Dipinjam',
            self::RETURNED => 'Dikembalikan',
            self::OVERDUE => 'Terlambat',
        };
    }

    public function getColor(): string
    {
        return match ($this) {
            self::ONGOING => 'warning',
            self::RETURNED => 'success',
            self::OVERDUE => 'danger',
        };
    }

    public static function options(): array
    {
        return collect(self::cases())
            ->mapWithKeys(fn ($case) => [$case->value => $case->label()])
            ->toArray();
    }
}
<?php

namespace App\Enums;

enum LoanStatus: string
{
    case Ongoing = 'ongoing';
    case Returned = 'returned';
    case Overdue = 'overdue';

    public function label(): string
    {
        return match ($this) {
            self::Ongoing => 'Ongoing',
            self::Returned => 'Returned',
            self::Overdue => 'Overdue',
        };
    }

    public function getColor(): string
    {
        return match ($this) {
            self::Ongoing => 'warning',
            self::Returned => 'success',
            self::Overdue => 'danger',
        };
    }

    public static function options(): array
    {
        return collect(self::cases())
            ->mapWithKeys(fn ($case) => [$case->value => $case->label()])
            ->toArray();
    }
}
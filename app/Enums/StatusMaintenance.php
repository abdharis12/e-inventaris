<?php

namespace App\Enums;

enum StatusMaintenance: string
{
    case PENDING = 'pending';
    case INPROGRESS = 'in progress';
    case COMPLETED = 'completed';
    case DAMAGED = 'damaged';

    public function label(): string
    {
        return match ($this) {
            self::PENDING => 'Menunggu',
            self::INPROGRESS => 'Dalam Pengerjaan',
            self::COMPLETED => 'Selesai',
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
            self::PENDING => 'warning',
            self::INPROGRESS => 'violet',
            self::COMPLETED => 'success',
            self::DAMAGED => 'red',
        };
    }
}

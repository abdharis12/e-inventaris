<?php

namespace App\Enums;

enum JenisHistory: string
{
    case CREATED = 'created';
    case UPDATED = 'updated';
    case MAINTENANCE = 'maintenance';
    case REPAIR = 'repair';
    case MOVED = 'moved';
    case LOANED = 'loaned';
    case RETURNED = 'returned';
    case DISPOSED = 'disposed';

    public static function options(): array
    {
        return collect(self::cases())
            ->mapWithKeys(fn ($case) => [$case->value => $case->label()])
            ->toArray();
    }   

    public function label(): string
    {
        return match ($this) {
            self::CREATED => 'Dibuat',
            self::UPDATED => 'Diupdate',
            self::MAINTENANCE => 'Perawatan',
            self::REPAIR => 'Perbaikan',
            self::MOVED => 'Dipindahkan',
            self::LOANED => 'Dipinjam',
            self::RETURNED => 'Dikembalikan',
            self::DISPOSED => 'Dihapus',
        };
    }

    public function getColor(): string | array | null
    {
        return match ($this) {
            self::CREATED => 'success',
            self::UPDATED => 'warning',
            self::MAINTENANCE => 'rose',
            self::REPAIR => 'emerald',
            self::MOVED => 'info',
            self::LOANED => 'violet',
            self::RETURNED => 'cyan',
            self::DISPOSED => 'danger',
        };
    }
}

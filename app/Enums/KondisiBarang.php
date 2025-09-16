<?php

namespace App\Enums;

enum KondisiBarang: string
{
    case BARU = 'baru';
    case BEKAS = 'bekas';
    case LAINNYA = 'lainnya';

    public function label(): string
    {
        return match ($this) {
            self::BARU => 'Baru',
            self::BEKAS => 'Bekas',
            self::LAINNYA => 'Lainnya',
        };
    }

    public static function options(): array
    {
        return collect(self::cases())
            ->mapWithKeys(fn ($case) => [$case->value => $case->label()])
            ->toArray();
    }

    public function getColor(): string | array | null
    {
        return match ($this) {
            self::BARU => 'success',
            self::BEKAS => 'violet',
            self::LAINNYA => 'red',
        };
    }
}

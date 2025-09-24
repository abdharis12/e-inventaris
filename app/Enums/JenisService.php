<?php

namespace App\Enums;

enum JenisService: string
{
    case SERVICE_BERKALA = 'service berkala';
    case SERVICE_KERUSAKAN = 'service kerusakan';

    public function label(): string
    {
        return match ($this) {
            self::SERVICE_BERKALA => 'Service Berkala',
            self::SERVICE_KERUSAKAN => 'Service Kerusakan',
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
            self::SERVICE_BERKALA => 'success',
            self::SERVICE_KERUSAKAN => 'danger',
        };
    }
}

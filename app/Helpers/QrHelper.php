<?php

namespace App\Helpers;

use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Writer;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class QrHelper
{
    public static function generate(string $prefix = 'qrcodes', ?string $uuid = null): array
    {
        $uuid = $uuid ?? Str::uuid()->toString();

        // QR berisi URL menuju scan
        $url = route('items.scan', $uuid);

        $renderer = new ImageRenderer(
            new RendererStyle(300),
            new SvgImageBackEnd()
        );
        $writer = new Writer($renderer);
        $path = "{$prefix}/{$uuid}.svg";

        Storage::disk('public')->put($path, $writer->writeString($url));

        return [
            'uuid' => $uuid,
            'path' => "storage/{$path}",
        ];
    }

    public static function generateUuid(): string
    {
        return Str::uuid()->toString();
    }
}

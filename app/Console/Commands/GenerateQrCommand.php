<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Item;
use App\Helpers\QrHelper;

class GenerateQrCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:qr {--force : Regenerate QR meskipun sudah ada}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate QR codes for items that do not have them (or regenerate with --force).';

    /**
     * Execute the console command. with command 
     * php artisan generate:qr
     */
    public function handle()
    {
        $items = Item::all();
        $count = 0;

        foreach ($items as $item) {
            // Kalau item sudah punya QR dan --force tidak dipakai, skip
            if ($item->qr_code && !$this->option('force')) {
                $this->line("Skip: {$item->nama_barang} (QR sudah ada)");
                continue;
            }

            // Generate UUID kalau belum ada
            if (!$item->qr_code || $this->option('force')) {
                $item->qr_code = QrHelper::generateUuid();
                $item->save();
            }

            // Generate file PNG baru
            QrHelper::generate('qrcodes', $item->qr_code);

            $this->info("Generated QR untuk {$item->nama_barang}");
            $count++;
        }

        $this->newLine();
        $this->info("Selesai! Total {$count} QR berhasil digenerate.");
    }
}

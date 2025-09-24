<?php

namespace App\Observers;

use App\Enums\StatusBarang;
use App\Models\Maintenance;
use Carbon\Carbon;

class MaintenanceObserver
{
    /**
     * Handle the Maintenance "created" event.
     */
    public function created(Maintenance $maintenance): void
    {
        if ($maintenance->item){
            // Update status item otomatis
            $maintenance->item->update([
                'status' => StatusBarang::UNDER_MAINTENANCE,
            ]);

            // Catat histori
            $maintenance->item->histories()->create([
                'jenis' => 'maintenance',
                'deskripsi' => "Perawatan: {$maintenance->deskripsi}, Biaya: Rp {$maintenance->biaya}",
                'tanggal' => now(),
            ]);
        }
    }

    /**
     * Handle the Maintenance "updated" event.
     */
    public function updated(Maintenance $maintenance): void
    {
        // Catat histori status awal dan status akhir
        $old = $maintenance->getOriginal('status');
        $new = $maintenance->status;

        $maintenance->item->histories()->create([
            'jenis' => 'repair',
            'deskripsi' => "Status perawatan berubah dari {$old} ke {$new}.",
            'tanggal' => now(),
        ]);

        // Jika maintenance selesai, ubah item jadi available
        if ($maintenance->status === 'completed') {
            $maintenance->item->update([
                'status' => StatusBarang::AVAILABLE,
            ]);
        }
        if ($maintenance->status === 'damaged') {
            $maintenance->item->update([
                'status' => StatusBarang::DAMAGED,
            ]);
        }
    }

    /**
     * Handle the Maintenance "deleted" event.
     */
    public function deleted(Maintenance $maintenance): void
    {
        if ($maintenance->item) {
            $maintenance->item->update([
                'status' => StatusBarang::AVAILABLE,
            ]);

            $maintenance->item->histories()->create([
                'jenis' => 'maintenance',
                'deskripsi' => "Data perawatan '{$maintenance->deskripsi}' dihapus.",
                'tanggal' => now(),
            ]);
        }
    }

    /**
     * Handle the Maintenance "restored" event.
     */
    public function restored(Maintenance $maintenance): void
    {
        //
    }

    /**
     * Handle the Maintenance "force deleted" event.
     */
    public function forceDeleted(Maintenance $maintenance): void
    {
        //
    }

    /**
     * Untuk service berkala
     */
    public function creating(Maintenance $maintenance): void
    {
        // Hitung next service otomatis
        if ($maintenance->tanggal_service && $maintenance->interval_hari) {
            $maintenance->next_service = Carbon::parse($maintenance->tanggal_service)
                ->addDays($maintenance->interval_hari);
        }
    }

    public function updating(Maintenance $maintenance): void
    {
        // Jika servis diselesaikan, set tanggal_service baru & next_service berikutnya
        if ($maintenance->status === 'completed' && $maintenance->interval_hari) {
            $maintenance->tanggal_service = now();
            $maintenance->next_service = now()->addDays($maintenance->interval_hari);
        }
    }
}

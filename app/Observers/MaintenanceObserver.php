<?php

namespace App\Observers;

use App\Models\Maintenance;

class MaintenanceObserver
{
    /**
     * Handle the Maintenance "created" event.
     */
    public function created(Maintenance $maintenance): void
    {
        // Update status item otomatis
        $maintenance->item->update([
            'status' => 'under maintenance',
        ]);

        // Catat histori
        $maintenance->item->histories()->create([
            'jenis' => 'maintenance',
            'deskripsi' => "Perawatan: {$maintenance->deskripsi}, Biaya: Rp {$maintenance->biaya}",
            'tanggal' => now(),
        ]);
    }

    /**
     * Handle the Maintenance "updated" event.
     */
    public function updated(Maintenance $maintenance): void
    {
         $maintenance->item->histories()->create([
            'jenis' => 'repair',
            'deskripsi' => "Status perawatan diperbarui menjadi {$maintenance->status}.",
            'tanggal' => now(),
        ]);

        // Jika maintenance selesai, ubah item jadi available
        if ($maintenance->status === 'completed') {
            $maintenance->item->update([
                'status' => 'available',
            ]);
        }
    }

    /**
     * Handle the Maintenance "deleted" event.
     */
    public function deleted(Maintenance $maintenance): void
    {
        //
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
}

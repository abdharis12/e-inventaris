<?php

namespace App\Observers;

use App\Models\Item;
use App\Helpers\QrHelper;

class ItemObserver
{
    public function creating(Item $item): void
    {
        // hanya generate sekali saat pertama kali buat
        if (!$item->qr_code) {
            $qr = QrHelper::generate();
            $item->qr_code = $qr['uuid']; // simpan UUID saja di DB
        }
    }

    public function created(Item $item): void
    {
        // simpan history
        $item->histories()->create([
            'jenis' => 'created',
            'deskripsi' => "Barang {$item->nama_barang} berhasil ditambahkan.",
            'tanggal' => now(),
        ]);
    }

    public function updated(Item $item): void
    {
        $item->histories()->create([
            'jenis' => 'updated',
            'deskripsi' => "Barang {$item->nama_barang} diperbarui.",
            'tanggal' => now(),
        ]);
    }

    public function deleted(Item $item): void
    {
        $item->histories()->create([
            'jenis' => 'disposed',
            'deskripsi' => "Barang {$item->nama_barang} dihapus dari inventaris.",
            'tanggal' => now(),
        ]);
    }

    public function deleting(Item $item): void
    {
        $item->histories()->create([
            'jenis' => 'disposed',
            'deskripsi' => "Barang {$item->nama_barang} dihapus dari inventaris.",
            'tanggal' => now(),
        ]);
    }
}

<?php

namespace App\Models;

use App\Enums\StatusLoan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Loan extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'status' => StatusLoan::class,
    ];

    public function item():BelongsTo
    {
        return $this->belongsTo(Item::class);
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected static function booted()
    {
        // Saat loan dibuat → simpan histori
        static::created(function ($loan) {
            $loan->item->histories()->create([
                'jenis' => 'loaned',
                'keterangan' => "Barang {$loan->item->nama_barang} dipinjam oleh {$loan->user->name}.",
                'tanggal' => now(),
            ]);

            $loan->item->update(['status_loan' => 'loaned']);
        });

        // Saat loan diupdate → misal status jadi returned
        static::updated(function ($loan) {
            if ($loan->status === 'returned') {
                $loan->item->histories()->create([
                    'jenis' => 'returned',
                    'keterangan' => "Barang {$loan->item->nama_barang} dikembalikan oleh {$loan->user->name}.",
                    'tanggal' => now(),
                ]);

                $loan->item->update(['status_loan' => 'available']);
            }

            if ($loan->status === 'overdue') {
                $loan->item->histories()->create([
                    'jenis' => 'overdue',
                    'keterangan' => "Barang {$loan->item->nama_barang} belum dikembalikan oleh {$loan->user->name} (terlambat).",
                    'tanggal' => now(),
                ]);

                $loan->item->update(['status_loan' => 'overdue']);
            }
        });
    }
}

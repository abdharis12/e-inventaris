<?php

namespace App\Models;

use App\Enums\LoanStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Loan extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'status' => LoanStatus::class,
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
                'jenis' => 'dipinjam',
                'keterangan' => "Barang {$loan->item->nama_barang} dipinjam oleh {$loan->user->name}.",
            ]);

            $loan->item->update(['status' => 'loaned']);
        });

        // Saat loan diupdate → misal status jadi returned
        static::updated(function ($loan) {
            if ($loan->status === 'returned') {
                $loan->item->histories()->create([
                    'jenis' => 'dikembalikan',
                    'keterangan' => "Barang {$loan->item->nama_barang} dikembalikan oleh {$loan->user->name}.",
                ]);

                $loan->item->update(['status' => 'available']);
            }

            if ($loan->status === 'overdue') {
                $loan->item->histories()->create([
                    'jenis' => 'terlambat',
                    'keterangan' => "Barang {$loan->item->nama_barang} belum dikembalikan oleh {$loan->user->name} (terlambat).",
                ]);
            }
        });
    }
}

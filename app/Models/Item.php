<?php

namespace App\Models;

use App\Enums\KondisiBarang;
use App\Enums\StatusBarang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Item extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'status' => StatusBarang::class,
        'kondisi' => KondisiBarang::class,
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function maintenances()
    {
        return $this->hasMany(Maintenance::class);
    }

    public function loans():HasMany
    {
        return $this->hasMany(Loan::class);
    }

    public function histories():HasMany
    {
        return $this->hasMany(ItemHistory::class);
    }

    protected static function booted()
    {
        static::created(function ($item) {
            $item->histories()->create([
                'jenis' => 'created',
                'deskripsi' => "Barang {$item->nama_barang} berhasil ditambahkan.",
                'tanggal' => now(),
            ]);
        });

        static::updated(function ($item) {
            $item->histories()->create([
                'jenis' => 'updated',
                'deskripsi' => "Barang {$item->nama_barang} diperbarui.",
                'tanggal' => now(),
            ]);
        });

        static::deleted(function ($item) {
            $item->histories()->create([
                'jenis' => 'disposed',
                'deskripsi' => "Barang {$item->nama_barang} dihapus dari inventaris.",
                'tanggal' => now(),
            ]);
        });
    }
}

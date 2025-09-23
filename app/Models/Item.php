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

    public function getQrPathAttribute(): string
    {
        return "qrcodes/{$this->qr_code}.svg";
    }
}

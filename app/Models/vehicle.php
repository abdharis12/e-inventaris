<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class vehicle extends Model
{
    protected $table = 'vehicles';

    protected $guarded = ['id'];

    public function item():BelongsTo
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
}

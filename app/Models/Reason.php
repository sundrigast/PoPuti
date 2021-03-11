<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reason extends Model
{
    protected $fillable = [
        'text',
        'by_passenger',
        'ride_id'
    ];

    public function ride(): BelongsTo
    {
        return $this->belongsTo(Ride::class, 'ride_id');
    }
}

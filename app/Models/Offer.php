<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Offer extends Model
{
    protected $fillable = [
        'price',
        'driver_id',
        'ride_id'
    ];

    public function driver(): BelongsTo
    {
        return $this->belongsTo(User::class,'driver_id');
    }

    public function ride(): BelongsTo
    {
        return $this->belongsTo(Ride::class,'ride_id');
    }

    public function scopeOutdated(Builder $builder)
    {
        return $builder->where('created_at', '<', Carbon::now()->subSeconds(30));
    }
}

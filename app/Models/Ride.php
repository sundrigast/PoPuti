<?php

namespace App\Models;

use App\Http\Filters\QueryFilter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ride extends Model
{
    protected $fillable = [
        'user_id',
        'driver_id',
        'city',
        'position',
        'from_lat',
        'from_lng',
        'destination',
        'to_lat',
        'to_lng',
        'price',
        'comment',
        'status_id',
        'start_at',
        'finish_at',
        'ride_duration'
    ];


    public function passenger(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function driver(): BelongsTo
    {
        return $this->belongsTo(User::class,'driver_id');
    }

    public function schedule()
    {
        return $this->hasOne(Schedule::class, 'ride_id');
    }

    public function messages()
    {
        return $this->hasMany(Message::class, 'ride_id');
    }

    public function status()
    {
        return $this->belongsTo(RideStatus::class,'status_id');
    }

    public function priceOffers()
    {
        return $this->hasMany(Offer::class, 'ride_id');
    }

    public function reasonForCancellation()
    {
        return $this->hasOne(Reason::class, 'ride_id');
    }

    public function scopeFilter(Builder $builder, QueryFilter $filters)
    {
        return $filters->apply($builder);
    }

    public function hasMember($id): bool
    {
        if ($this->driver != null) {
            return ($this->driver_id == $id || $this->user_id == $id);
        }
        else {
            return true;
        }
    }
}

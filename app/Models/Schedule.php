<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'monday',
        'tuesday',
        'wednesday',
        'thursday',
        'friday',
        'saturday',
        'sunday',
        'time',
        'ride_id'
    ];

    public function ride()
    {
        return $this->belongsTo(Ride::class,'ride_id');
    }
}

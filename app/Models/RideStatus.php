<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RideStatus extends Model
{
    protected $fillable = [
        'name'
    ];

    public function rides()
    {
        return $this->hasMany(Ride::class, 'status_id', 'id');
    }
}

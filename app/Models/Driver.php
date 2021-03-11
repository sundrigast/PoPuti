<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Optix\Media\HasMedia;

class Driver extends Model
{
    use HasMedia;

    protected $fillable = [
        'user_id',
        'passport',
        'drivers_license',
        'car_brand',
        'car_model',
        'car_number',
        'registration',
        'verify',
        //'latitude',
        //'longitude'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeVerify($query, bool $verify)
    {
        return $query->where('verify', $verify);
    }
}

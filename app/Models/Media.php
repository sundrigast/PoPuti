<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Optix\Media\Models\Media as OptixMedia;

class Media extends OptixMedia
{
    protected $fillable = [
        'verify'
    ];

    public function users()
    {
        return $this->morphedByMany(User::class, 'mediable');
    }

    public function drivers()
    {
        return $this->morphedByMany(Driver::class, 'mediable');
    }
}

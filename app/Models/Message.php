<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Ride;
use App\Models\User;

class Message extends Model
{
    protected $fillable = [
        'ride_id',
        'author_id',
        'text',
        'is_read',
    ];
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function ride()
    {
        return $this->belongsTo(Ride::class,'ride_id');
    }
}

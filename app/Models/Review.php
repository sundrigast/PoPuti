<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Review extends Model
{
    protected $fillable = [
        'text',
        'from_id',
        'to_id',
        'rating'
    ];

    public function author()
    {
        return $this->belongsTo(User::class,'from_id');
    }

    public function addressee()
    {
        return $this->belongsTo(User::class,'to_id');
    }
}

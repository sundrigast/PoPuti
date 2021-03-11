<?php

namespace App\Models;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PhoneVerification extends Model
{
    protected $fillable = [
        'user_id',
        'code',
    ];

    protected $primaryKey = 'code';

    public $incrementing = false;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeOutdated(Builder $builder)
    {
        return $builder->where('created_at', '<', Carbon::now()->subMinutes(5));
    }
}

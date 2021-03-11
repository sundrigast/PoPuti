<?php


namespace App\Http\Filters;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class RideFilter extends QueryFilter
{
    public function status($value)
    {
        if (! $value) return;

        $this->builder->whereHas('status', function ($query) use ($value) {
           $query->where('id', $value);
        });
    }

    public function date($value)
    {
        return $this->builder->whereBetween('start_at', [$value[0], $value[1]]);
    }

    public function city($value)
    {
        return $this->builder->where('city', 'like', "%$value%");
    }

    public function duration($value)
    {
        return $this->builder->where('ride_duration', 'like', "%$value%");
    }

    public function price($value)
    {
        return $this->builder->whereBetween('price', [$value[0], $value[1]]);
    }

    public function member(array $value)
    {
        if (! $value) return;

        $callback =  function ($query) use ($value) {
            $query->where('first_name', 'like', "%$value[0]%")
                ->where('last_name', 'like', "%$value[1]%");
            };

        $this->builder->whereHas('passenger', $callback)
            ->orwhereHas('driver', $callback);
    }

}

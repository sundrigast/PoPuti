<?php


namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class UserFilter extends QueryFilter
{
    public function city($value)
    {
        return $this->builder->where('city', 'like', "%$value%");
    }

    public function verify($value)
    {
        switch ($value) {
            case 'true':
                $this->builder->where('verify', true);
                break;
            default:
                $this->builder->where('verify', false);
        }
    }

    public function phone($value)
    {
        return $this->builder->where('phone', 'like', "%$value%");
    }

    public function name($value)
    {
        return $this->builder->where('first_name', $value[0])
            ->where('last_name', $value[1]);
    }

    public function rating($value)
    {
        return $this->builder->whereBetween('rating', [$value[0], $value[1]]);
    }

    public function driver($value)
    {
        switch ($value) {
            case 'true':
                return $this->builder->has('driver');
                break;
            default:
                $this->builder->doesntHave('driver');
        }
    }
}

<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Ride;
use Illuminate\Auth\Access\HandlesAuthorization;

class RidePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Ride $ride
     * @return mixed
     */
    public function update(User $user, Ride $ride)
    {
        return $ride->hasMember($user->id);
    }
}

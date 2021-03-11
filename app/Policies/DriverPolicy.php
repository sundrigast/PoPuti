<?php

namespace App\Policies;

use App\Models\Driver;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DriverPolicy
{
    use HandlesAuthorization;

    public function before(User $user)
    {
        if ($user->isAdmin()) {
            return true;
        };
    }
    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Driver $driver
     * @return mixed
     */
    public function update(User $user, Driver $driver)
    {
        return $user->id == $driver->user_id;
    }
}

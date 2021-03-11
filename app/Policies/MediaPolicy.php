<?php

namespace App\Policies;

use App\Models\Media;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MediaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Media $media
     * @return mixed
     */
    public function update(User $user, Media $media)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Media $media
     * @return mixed
     */
    public function delete(User $user, Media $media)
    {
        return $user->id = $media->user_id;
    }
}

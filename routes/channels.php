<?php

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('ride.{rideId}', function ($user, $rideId) {
    return \App\Models\Ride::find($rideId)->hasMember($user->id);
});

Broadcast::channel('ride.{rideId}.chat', function ($user, $rideId) {
    return \App\Models\Ride::find($rideId)->hasMember($user->id);
});

Broadcast::channel('driver.{driverId}', function ($user, $driverId) {
    return $user->id == $driverId->user_id;
});

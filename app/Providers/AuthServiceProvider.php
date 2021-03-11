<?php

namespace App\Providers;

use App\Models\Driver;
use App\Models\Media;
use App\Models\Message;
use App\Models\Ride;
use App\Models\User;
use App\Policies\DriverPolicy;
use App\Policies\MediaPolicy;
use App\Policies\MessagePolicy;
use App\Policies\RidePolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Driver::class => DriverPolicy::class,
        Media::class => MediaPolicy::class,
        Ride::class => RidePolicy::class,
        User::class => UserPolicy::class,
        Message::class => MessagePolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

       // Passport::routes();
       // Passport::enableImplicitGrant();
    }
}

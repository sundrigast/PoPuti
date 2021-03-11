<?php

namespace App\Providers;

use App\Models\Media;
use App\Models\Review;
use App\Models\Ride;
use App\Observers\MediaObserver;
use App\Observers\ReviewObserver;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (config("app.is_secure")) {
            URL::forceScheme('https');
        }

        Review::observe(ReviewObserver::class);
        Media::observe(MediaObserver::class);

        JsonResource::withoutWrapping();
    }
}

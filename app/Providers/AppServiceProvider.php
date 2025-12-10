<?php

namespace App\Providers;

use App\Models\Player;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Register PlayerObserver for new player score
        Player::observe(\App\Observers\PlayerObserver::class);
    }
}

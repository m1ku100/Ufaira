<?php

namespace App\Providers;

use App\Models\Master\Banner;
use App\Models\Master\Tour;
use App\Models\Master\User;
use App\Policies\BannerPolicy;
use App\Policies\TourPolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Banner::class => BannerPolicy::class,
        User::class => UserPolicy::class,
        Tour::class => TourPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}

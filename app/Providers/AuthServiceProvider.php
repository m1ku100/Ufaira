<?php

namespace App\Providers;

use App\Models\Master\Banner;
use App\Models\Master\Gallery;
use App\Models\Master\Rental;
use App\Models\Master\Tour;
use App\Models\Master\User;
use App\Policies\BannerPolicy;
use App\Policies\GalleryPolicy;
use App\Policies\RentalPolicy;
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
        Tour::class => TourPolicy::class,
        Rental::class => RentalPolicy::class,
        Gallery::class => GalleryPolicy::class
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

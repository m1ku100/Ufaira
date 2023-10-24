<?php

namespace App\Providers;

use App\Contract\Master\BannerContract;
use App\Contract\Master\GalleryContract;
use App\Contract\Master\RentalContract;
use App\Contract\Master\RoleContract;
use App\Contract\Master\TourContract;
use App\Contract\Master\UserContract;
use App\Contract\Utilities\PreferensiContract;
use App\Repositories\Back\Master\BannerRepository;
use App\Repositories\Back\Master\GalleryRepository;
use App\Repositories\Back\Master\RentalRepository;
use App\Repositories\Back\Master\RoleRepository;
use App\Repositories\Back\Master\TourRepository;
use App\Repositories\Back\Master\UserRepository;
use App\Repositories\Back\Utilities\PreferensiRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{

    protected $repositories = [
        RoleContract::class => RoleRepository::class,
        BannerContract::class => BannerRepository::class,
        UserContract::class => UserRepository::class,
        PreferensiContract::class => PreferensiRepository::class,
        TourContract::class => TourRepository::class,
        RentalContract::class => RentalRepository::class,
        GalleryContract::class => GalleryRepository::class
    ];
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->repositories as $contract => $implement) {
            $this->app->bind($contract, $implement);
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

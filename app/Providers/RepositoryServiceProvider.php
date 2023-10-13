<?php

namespace App\Providers;

use App\Contract\Master\RoleContract;
use App\Repositories\Back\Master\RoleRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{

    protected $repositories = [
        RoleContract::class => RoleRepository::class,

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

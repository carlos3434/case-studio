<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

//Settings
use App\Repositories\User\UserRepository;
use App\Repositories\User\UserInterface;
use App\Repositories\Employee\EmployeeRepository;
use App\Repositories\Employee\EmployeeInterface;


use App\Repositories\AbstractRepository;
use App\Repositories\RepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //Auth
        $this->app->bind( UserInterface::class , UserRepository::class );
        $this->app->bind( EmployeeInterface::class , EmployeeRepository::class );

        //abstract
        $this->app->bind( RepositoryInterface::class, AbstractRepository::class );
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

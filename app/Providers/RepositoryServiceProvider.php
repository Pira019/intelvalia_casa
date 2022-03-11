<?php

namespace App\Providers;

use App\Interfaces\Calcules\ICalcules;
use App\Interfaces\IConge;
use App\Interfaces\IEmployeeRepo;

use App\Interfaces\ISoldeConge;
use App\Repositories\CalculesRepository;
use App\Repositories\CongeRepository;
use App\Repositories\EmployeeRepository;
use App\Repositories\SoldeCongeRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IEmployeeRepo::class,EmployeeRepository::class);
        $this->app->bind(ISoldeConge::class,SoldeCongeRepository::class);
        $this->app->bind(ICalcules::class,CalculesRepository::class);
        $this->app->bind(IConge::class,CongeRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

    }
}

<?php

namespace App\Providers;

use App\Repository\CustomerRepository;
use App\Repository\Interfaces\CustomerRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        /**
         * Bind the CustomerRepositoryInterface to CustomerRepository for laravel to resolve in runtime
         **/
        $this->app->bind(CustomerRepositoryInterface::class, CustomerRepository::class);
    }
}

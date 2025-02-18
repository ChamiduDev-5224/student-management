<?php

namespace App\Providers;

use App\Repositories\StudentRepository;
use App\Repositories\StudentRepositoryInterface as RepositoriesStudentRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use StudentRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(RepositoriesStudentRepositoryInterface::class, StudentRepository::class);
    }


    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

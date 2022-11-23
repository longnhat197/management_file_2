<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\File\FileRepository;
use App\Repositories\File\FileRepositoryInterface;
use App\Services\File\FileService;
use App\Services\File\FileServiceInterface;

use App\Repositories\Contractor\ContractorRepository;
use App\Repositories\Contractor\ContractorRepositoryInterface;
use App\Services\Contractor\ContractorService;
use App\Services\Contractor\ContractorServiceInterface;

use App\Repositories\Project\ProjectRepository;
use App\Repositories\Project\ProjectRepositoryInterface;
use App\Services\Project\ProjectService;
use App\Services\Project\ProjectServiceInterface;

use App\Repositories\Customer\CustomerRepository;
use App\Repositories\Customer\CustomerRepositoryInterface;
use App\Services\Customer\CustomerService;
use App\Services\Customer\CustomerServiceInterface;

use App\Repositories\Package\PackageRepository;
use App\Repositories\Package\PackageRepositoryInterface;
use App\Services\Package\PackageService;
use App\Services\Package\PackageServiceInterface;

use App\Repositories\ListUser\ListUserRepository;
use App\Repositories\ListUser\ListUserRepositoryInterface;
use App\Services\ListUser\ListUserService;
use App\Services\ListUser\ListUserServiceInterface;

use App\Repositories\Detail\DetailRepository;
use App\Repositories\Detail\DetailRepositoryInterface;
use App\Services\Detail\DetailService;
use App\Services\Detail\DetailServiceInterface;

use App\Repositories\User\UserRepository;
use App\Repositories\User\UserRepositoryInterface;
use App\Services\User\UserService;
use App\Services\User\UserServiceInterface;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //File
        $this->app->singleton(
            FileRepositoryInterface::class,
            FileRepository::class,
        );

        $this->app->singleton(
            FileServiceInterface::class,
            FileService::class,
        );

        //Contractor
        $this->app->singleton(
            ContractorRepositoryInterface::class,
            ContractorRepository::class,
        );

        $this->app->singleton(
            ContractorServiceInterface::class,
            ContractorService::class,
        );

        //Project
        $this->app->singleton(
            ProjectRepositoryInterface::class,
            ProjectRepository::class,
        );

        $this->app->singleton(
            ProjectServiceInterface::class,
            ProjectService::class,
        );

        //Customer
        $this->app->singleton(
            CustomerRepositoryInterface::class,
            CustomerRepository::class,
        );

        $this->app->singleton(
            CustomerServiceInterface::class,
            CustomerService::class,
        );

        //Package
        $this->app->singleton(
            PackageRepositoryInterface::class,
            PackageRepository::class,
        );

        $this->app->singleton(
            PackageServiceInterface::class,
            PackageService::class,
        );

        //ListUser
        $this->app->singleton(
            ListUserRepositoryInterface::class,
            ListUserRepository::class,
        );

        $this->app->singleton(
            ListUserServiceInterface::class,
            ListUserService::class,
        );

        //Detail
        $this->app->singleton(
            DetailRepositoryInterface::class,
            DetailRepository::class,
        );

        $this->app->singleton(
            DetailServiceInterface::class,
            DetailService::class,
        );

        //User
        $this->app->singleton(
            UserRepositoryInterface::class,
            UserRepository::class,
        );

        $this->app->singleton(
            UserServiceInterface::class,
            UserService::class,
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

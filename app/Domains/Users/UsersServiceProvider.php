<?php

namespace App\Domains\Users;

use App\Domains\Users\Services\UsersService;
use App\Domains\Users\Services\UsersServiceContract;
use Illuminate\Support\ServiceProvider;

class UsersServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(UsersServiceContract::class, UsersService::class);
    }

    public function provides(): array
    {
        return [
            UsersServiceContract::class,
        ];
    }
}
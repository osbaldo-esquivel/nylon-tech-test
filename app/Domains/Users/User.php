<?php

namespace App\Domains\Users;

use App\Domains\Users\Inputs\CreateInput;
use App\Domains\Users\Models\Relational\User as UserModel;
use App\Domains\Users\Services\UsersServiceContract;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Facade;

/**
 * @method static UserModel create(CreateInput $input)
 * @method static Collection getAll()
 * @method static bool disable(int $userId)
 * @method static bool enable(int $userId)
 */
class User extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return UsersServiceContract::class;
    }
}
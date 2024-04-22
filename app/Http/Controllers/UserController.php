<?php

namespace App\Http\Controllers;

use App\Domains\Users\Models\Relational\User as UserModel;
use App\Domains\Users\User;
use App\Http\Requests\UserCreateRequest;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create(UserCreateRequest $request): UserModel
    {
        return User::create(
            $request->firstName,
            $request->lastName,
            $request->email,
            $request->ssn
        );
    }

    public function getAll(): Collection
    {
        return User::getAll();
    }

    public function disable(Request $request): bool
    {
        return User::disable($request->id);
    }

    public function enable(Request $request): bool
    {
        return User::enable($request->id);
    }
}
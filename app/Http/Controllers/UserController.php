<?php

namespace App\Http\Controllers;

use App\Domains\Users\Inputs\CreateInput;
use App\Domains\Users\Models\Relational\User as UserModel;
use App\Domains\Users\User;
use App\Http\Requests\UserCreateRequest;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create(UserCreateRequest $request): UserModel
    {
        $input = new CreateInput();

        $input->firstName = $request->firstName;
        $input->lastName = $request->lastName;
        $input->email = $request->email;
        $input->ssn = $request->ssn;

        return User::create($input);
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
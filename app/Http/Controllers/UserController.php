<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Models\User;

class UserController extends Controller
{
    public function create(UserCreateRequest $request): User
    {
        return User::query()
            ->create([
                'first_name' => $request->firstName,
                'last_name' => $request->lastName,
                'ssn' => $request->ssn,
                'email' => $request->email,
            ]);
    }
}
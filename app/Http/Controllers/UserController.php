<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

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
                'is_disabled' => false,
            ]);
    }

    public function getAll(): Collection
    {
        return User::query()
            ->get();
    }

    public function disable(Request $request): void
    {
        User::query()
            ->find($request->id)
            ->update([
                'is_disabled' => true,
            ]);
    }

    public function enable(Request $request): void
    {
        User::query()
            ->find($request->id)
            ->update([
                'is_disabled' => false,
            ]);
    }
}
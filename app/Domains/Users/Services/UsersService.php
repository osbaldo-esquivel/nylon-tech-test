<?php

namespace App\Domains\Users\Services;

use App\Domains\Users\Models\Relational\User;
use Illuminate\Database\Eloquent\Collection;

class UsersService implements UsersServiceContract
{
    public function create(string $firstName, string $lastName, string $email, string $ssn): User
    {
        return User::query()
            ->create([
                'first_name' => $firstName,
                'last_name' => $lastName,
                'ssn' => $ssn,
                'email' => $email,
                'is_disabled' => false,
            ]);
    }

    public function getAll(): Collection
    {
        return User::query()
            ->get();
    }

    public function disable(int $userId): bool
    {
        return User::query()
            ->find($userId)
            ->update([
                'is_disabled' => true,
            ]);
    }

    public function enable(int $userId): bool
    {
        return User::query()
            ->find($userId)
            ->update([
                'is_disabled' => false,
            ]);
    }
}
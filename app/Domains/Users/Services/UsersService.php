<?php

namespace App\Domains\Users\Services;

use App\Domains\Users\Inputs\CreateInput;
use App\Domains\Users\Models\Relational\User;
use Illuminate\Database\Eloquent\Collection;

class UsersService implements UsersServiceContract
{
    public function create(CreateInput $input): User
    {
        return User::query()
            ->create([
                'first_name' => $input->firstName,
                'last_name' => $input->lastName,
                'ssn' => $input->ssn,
                'email' => $input->email,
                'is_disabled' => $input->isDisabled,
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
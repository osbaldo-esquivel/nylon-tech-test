<?php

namespace App\Domains\Users\Services;

use App\Domains\Users\Models\Relational\User;
use Illuminate\Database\Eloquent\Collection;

interface UsersServiceContract
{
    public function create(
        string $firstName,
        string $lastName,
        string $email,
        string $ssn
    ) : User;

    public function getAll(): Collection;

    public function disable(int $userId): bool;

    public function enable(int $userId): bool;
}
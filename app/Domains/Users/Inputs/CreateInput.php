<?php

namespace App\Domains\Users\Inputs;

class CreateInput
{
    public ?string $firstName;

    public ?string $lastName;

    public ?string $email;

    public ?string $ssn;

    public ?bool $isDisabled = false;
}
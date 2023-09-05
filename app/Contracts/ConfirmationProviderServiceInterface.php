<?php

namespace App\Contracts;

use App\Models\Confirmation;
use App\Models\User;

interface ConfirmationProviderServiceInterface
{
    public function sendConfirmationCode(User $user, string $code): void;
}

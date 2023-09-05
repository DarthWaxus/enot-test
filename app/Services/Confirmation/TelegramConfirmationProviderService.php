<?php

namespace App\Services\Confirmation;

use App\Models\Confirmation;
use App\Models\User;

class TelegramConfirmationProviderService implements \App\Contracts\ConfirmationProviderServiceInterface
{

    public function sendConfirmationCode(User $user, string $code): void
    {

    }
}

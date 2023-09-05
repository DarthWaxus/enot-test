<?php

namespace App\Services\Confirmation;

use App\Contracts\ConfirmationProviderServiceInterface;
use App\Models\Confirmation;
use App\Models\User;
use Carbon\Carbon;

class ConfirmationService
{
    public function sendConfirmation(User $user, ConfirmationProviderServiceInterface $confirmationProviderService): Confirmation
    {
        $code = $this->generateCode();
        $confirmation = new Confirmation([
            'user_id' => $user->id,
            'code' => $code,
            'confirmation_type_id' => $user->confirmation_type_id,
            'expired_at' => Carbon::now()->addHour()
        ]);
        $confirmationProviderService->sendConfirmationCode($user, $code);
        $confirmation->save();
        return $confirmation;
    }

    public function generateCode(): string
    {
        return '1234';
    }
}
